import time
import board
import neopixel
import socket

# Choose an open pin connected to the Data In of the NeoPixel strip, i.e. board.D18
# NeoPixels must be connected to D10, D12, D18 or D21 to work.
pixel_pin = board.D21

# The number of NeoPixels
num_pixels = 150

# The order of the pixel colors - RGB or GRB. Some NeoPixels have red and green reversed!
ORDER = neopixel.GRB

pixels = neopixel.NeoPixel(
  pixel_pin, num_pixels, brightness=0.8, auto_write=False, pixel_order=ORDER
)

def wipe(color):
  pixels.fill(color)
  pixels.show()

def wheel(pos):
    # Input a value 0 to 255 to get a color value.
    # The colours are a transition r - g - b - back to r.
    if pos < 0 or pos > 255:
        r = g = b = 0
    elif pos < 85:
        r = int(pos * 3)
        g = int(255 - pos * 3)
        b = 0
    elif pos < 170:
        pos -= 85
        r = int(255 - pos * 3)
        g = 0
        b = int(pos * 3)
    else:
        pos -= 170
        r = 0
        g = int(pos * 3)
        b = int(255 - pos * 3)
    return (r, g, b) if ORDER in (neopixel.RGB, neopixel.GRB) else (r, g, b, 0)


def rainbow_cycle(wait):
    for j in range(255):
        for i in range(num_pixels):
            pixel_index = (i * 256 // num_pixels) + j
            pixels[i] = wheel(pixel_index & 255)
        pixels.show()
        time.sleep(wait)


s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind(('localhost', 50000))


while True:
  #pixels.fill((255, 0, 0))
  #pixels.show()
  #time.sleep(1)
  try:
    # read in input
    s.listen(1)
    conn, addr = s.accept()
    data = conn.recv(1024)  # 1024)

    if data:
      data_str = str(data, "ascii")
      args = data_str.split()
      mode = args[3]
      if mode == "wipe":
        wipe((args[0], args[1], args[2]))
      else:
        rainbow_cycle(0.01)
      conn.sendall(data)
    #  break
    #else:
    #  rainbow_cycle(0.01)

    # display data
    #rainbow_cycle(0.01)  # rainbow cycle with 10ms delay per step
  except:
    # write out error to log
    pass

conn.close()
