#!/bin/bash

echo "Starting Virtual Controller..."
./virtual_controller &
VC_PID=$!

echo "Starting PHP Server..."

echo "System is running. Press Ctrl+C to stop."
trap "echo Stopping...; kill $VC_PID; sudo systemctl stop apache2; exit" SIGINT
while true; do sleep 1; done