// server.js
const express = require('express');
const http = require('http');
const WebSocket = require('ws');

const app = express();
const PORT = 3000; // You can change the port if needed

// Create a basic HTTP server
const server = http.createServer(app);

// Create a WebSocket server
const wss = new WebSocket.Server({ server });

// Handle WebSocket connections
wss.on('connection', (ws) => {
    console.log('New client connected');

    // Send a message to the connected client
    ws.send('Welcome to the WebSocket server!');

    // Handle incoming messages from the client
    ws.on('message', (message) => {
        console.log('Received:', message);
        // Echo the message back to the client
        ws.send(`You said: ${message}`);
    });

    // Handle disconnection
    ws.on('close', () => {
        console.log('Client disconnected');
    });
});

// Set up a simple HTTP endpoint
app.get('/', (req, res) => {
    res.send('Hello from Express! Connect to WebSocket at ws://localhost:3000');
});

// Start the server
server.listen(PORT, () => {
    console.log(`Server is listening on http://localhost:${PORT}`);
});
