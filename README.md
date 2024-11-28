# Virtual Controller
This project simulates a virtual relay and bulb system, controllable via HTTP requests in real-time. It integrates WebSockets for instant status updates, a PHP server for command processing, and a C-based virtual controller for simulation. 

---

## Features
- **Real-time control and status updates** using WebSockets
- **PHP server** processes commands (`ON`/`OFF`) via HTTP.
- Exposes the server to the internet using **ngrok**.
- Automates setup with shell scripts.

---

## Setup Instructions

### 1. Install Requirements
- PHP
- [GCC](https://sourceforge.net/projects/mingw/files/Installer/mingw-get-setup.exe/download)
- [ngrok](https://ngrok.com/download)
- Composer (for dependency management)

### 2. Prepare Files
- Place all files in a single directory.

### 3. Install composer
```bash
composer install
```

### 4. Compile the C Program
```bash
gcc virtual_controller.c -o virtual_controller
```

---

## How to Run

### 1. Start WebSocket Server
```bash
php server.php
```
- Starts the WebSocket server for real-time updates.

### 2. Start the Server and ngrok
```bash
./run_server.sh
```
- The PHP server and ngrok will start.

### 3. Expose the Server using ngrok
```bash
ngrok http 8080
```
- Use the provided public URL for external access.
  
### 4. Run the Virtual Controller
```bash
./run_system.sh
```
- Starts the virtual controller in sync with the server.

### 5. Test the System
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
