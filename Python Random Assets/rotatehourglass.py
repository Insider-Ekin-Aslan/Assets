import os
import time

frames = [
    "▼\n▲",
    " ◣\n◥ ",
    "▶◀",
    "◢ \n ◤"
]

while True:
    for frame in frames:
        os.system('cls' if os.name == 'nt' else 'clear')
        print(frame)
        time.sleep(.1)
