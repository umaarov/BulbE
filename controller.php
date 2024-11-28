<?php

require 'vendor/autoload.php';

use Ratchet\Client\WebSocket;
use Ratchet\Client\Connector;

$command_file = "D:/AllFiles/wamp64/www/command.txt";

if (isset($_GET['cmd'])) {
    $command = $_GET['cmd'];

    if ($command === "ON" || $command === "OFF") {
        file_put_contents($command_file, $command);
        echo "Command set to: $command";
        
        notifyWebSocketClients($command);
    } else {
        echo "Invalid command!";
    }
} else {
    echo "No command received!";
}

function notifyWebSocketClients($command) {
    $connector = new Connector();

    $connector('ws://localhost:8080')->then(
        function (WebSocket $conn) use ($command) {
            $conn->send($command);
            echo "Command sent to WebSocket: $command\n";

            $conn->close();
        },
        function ($e) {
            echo "Could not connect to WebSocket: {$e->getMessage()}\n";
        }
    );
}
?>
