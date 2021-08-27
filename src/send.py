import socket
import sys

red = sys.argv[1]
green = sys.argv[2]
blue = sys.argv[3]
mode = sys.argv[4]

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(('localhost', 50000))

send_str = str(red) + " " + str(green) + " " + str(blue) + " " + str(mode)
b = send_str.encode("ascii")
s.sendall(b)

data = s.recv(1024)
s.close()
print('Received', repr(data))
