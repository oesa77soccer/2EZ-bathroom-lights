import socket
import sys

arg = sys.argv[1]

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(('localhost', 50000))
new_str = str(arg)
b = new_str.encode("ascii")
s.sendall(b)
data = s.recv(1024)
s.close()
print('Received', repr(data))
