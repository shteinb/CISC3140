/*
// Import necessary modules
const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const bcrypt = require('bcrypt');

const app = express();

// Configure middleware
app.use(bodyParser.urlencoded({ extended: true }));

// Create MySQL connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'shteinb', // Change to your MySQL username
    password: 'Pandora1954!', // Change to your MySQL root password
    database: 'userauth'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connected to MySQL database');
});

// Serve static files (HTML, CSS, images, etc.)
app.use(express.static(__dirname + '/public'));

// Register endpoint
app.post('/register', (req, res) => {
    const { username, password } = req.body;
    const hashedPassword = bcrypt.hashSync(password, 10);

    const sql = 'INSERT INTO Users (username, password) VALUES (?, ?)';
    db.query(sql, [username, hashedPassword], (err, result) => {
        if (err) throw err;
        console.log('User registered');
        res.redirect('/login.html'); // Redirect to login page after registration
    });
});

// ... Rest of your code

// Start the server
app.listen(3306, () => {
    console.log('Server started on port 3000');
}); */

