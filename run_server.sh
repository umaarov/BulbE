#!/bin/bash

PROJECT_DIR="D:/AllFiles/wamp64/www/"
PORT=8000

echo "Starting PHP server on port $PORT..."
php -S 127.0.0.1:$PORT -t "$PROJECT_DIR" > php_server.log 2>&1 &

PHP_PID=$!

sleep 2

if ! ps -p $PHP_PID > /dev/null; then
  echo "Failed to start PHP server."
  exit 1
fi
echo "PHP server started successfully with PID $PHP_PID."

echo "Starting ngrok for PHP server on port $PORT..."
ngrok http $PORT > ngrok.log 2>&1 &

NGROK_PID=$!

sleep 5

NGROK_URL=$(grep -o 'https://[0-9a-z]*\.ngrok\.io' ngrok.log | head -n 1)
if [ -z "$NGROK_URL" ]; then
  echo "Failed to retrieve ngrok URL."
  kill $PHP_PID
  kill $NGROK_PID
  exit 1
fi
echo "ngrok URL: $NGROK_URL"

echo "$NGROK_URL" > public_url.txt
echo "Public URL saved to public_url.txt"

echo "Press Ctrl+C to stop the server and ngrok."
tail -f php_server.log ngrok.log

trap "kill $PHP_PID $NGROK_PID" EXIT
