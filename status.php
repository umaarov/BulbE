<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulb Status</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .status {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }
        .on {
            background-color: green;
        }
        .off {
            background-color: red;
        }
    </style>
</head>
<body>
    <div id="status" class="status off"></div>

    <script>
        const statusDiv = document.getElementById("status");

        const socket = new WebSocket('ws://localhost:8080')

        socket.onopen = function(event) {
            console.log("WebSocket connection established.");
        };

        socket.onmessage = function(event) {
            console.log("Message received: " + event.data); 
            const command = event.data.trim();
            if (command === "ON") {
                statusDiv.className = "status on";
            } else if (command === "OFF") {
                statusDiv.className = "status off";
            }
        };

        socket.onerror = function(error) {
            console.error("WebSocket Error:", error);
        };

        socket.onclose = function(event) {
            console.log("WebSocket connection closed.");
        };
    </script>
</body>
</html>
