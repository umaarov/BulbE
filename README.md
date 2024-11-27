# Virtual Controller
This project simulates a virtual relay and bulb system. Controller can be operated through HTTP requests, and the project integrates with `ngrok` for external access.

---

## Features
- A **virtual controller** simulates a relay and bulb.
- **PHP server** processes commands (`ON`/`OFF`) via HTTP.
- Exposes the server to the internet using **ngrok**.
- Automates setup with shell scripts.

---

## Setup Instructions

### 1. Install Requirements
- PHP
- [GCC](https://sourceforge.net/projects/mingw/files/Installer/mingw-get-setup.exe/download)
- [ngrok](https://ngrok.com/download)

### 2. Prepare Files
- Place all files in a single directory.

### 3. Compile the C Program
```bash
gcc virtual_controller.c -o virtual_controller
```

---

## How to Run

### 1. Start the Server and ngrok
```bash
./run_server.sh
```
- The PHP server and ngrok will start.
- The ngrok public URL is saved in `public_url.txt`.

### 2. Run the Virtual Controller
```bash
./run_system.sh
```
- Starts the virtual controller in sync with the server.

### 3. Test the System
- Use the ngrok public URL to send commands:
```bash
https://<your-ngrok-url>/controller.php?cmd=ON
https://<your-ngrok-url>/controller.php?cmd=OFF
```
- Check the output in the terminal for relay and bulb states.

---

## Conclusion
This project simulates a virtual relay and bulb system that you control via HTTP requests. It integrates a PHP server, a C-based virtual controller, and uses ngrok for external accessibility. It's lightweight, cost-free, and sets the foundation for more advanced projects like integration or hardware control. 🚀
With everything automated through scripts, you can focus on experimenting and building new features. This project is perfect for learning system integration and handling real-time commands.
