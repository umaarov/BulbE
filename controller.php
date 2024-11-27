<?php
$command_file = "D:/AllFiles/wamp64/www/command.txt";

if (isset($_GET['cmd'])) {
    $command = $_GET['cmd'];

    if ($command === "ON" || $command === "OFF") {
        file_put_contents($command_file, $command);
        echo "Command set to: $command";
    } else {
        echo "Invalid command!";
    }
} else {
    echo "No command received!";
}