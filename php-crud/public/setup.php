<?php
// setup.php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Update with your MySQL password
$dbname = "beer_sales";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db($dbname);

// Create beer_names table
$sql = "CREATE TABLE IF NOT EXISTS beer_names (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'beer_names' created successfully<br>";
} else {
    echo "Error creating table 'beer_names': " . $conn->error . "<br>";
}

// Insert sample beer names
$sql = "INSERT INTO beer_names (name) VALUES 
    ('Ale'), 
    ('Lager'), 
    ('Stout')";
if ($conn->query($sql) === TRUE) {
    echo "Sample beer names inserted successfully<br>";
} else {
    echo "Error inserting sample beer names: " . $conn->error . "<br>";
}

// Create pubs table
$sql = "CREATE TABLE IF NOT EXISTS pubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'pubs' created successfully<br>";
} else {
    echo "Error creating table 'pubs': " . $conn->error . "<br>";
}

// Insert sample pubs
$sql = "INSERT INTO pubs (name) VALUES 
    ('PUB_A'), 
    ('PUB_B'), 
    ('PUB_C')";
if ($conn->query($sql) === TRUE) {
    echo "Sample pubs inserted successfully<br>";
} else {
    echo "Error inserting sample pubs: " . $conn->error . "<br>";
}

// Create sales table
$sql = "CREATE TABLE IF NOT EXISTS sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pub_id INT,
    beer_id INT,
    quantity INT,
    FOREIGN KEY (pub_id) REFERENCES pubs(id),
    FOREIGN KEY (beer_id) REFERENCES beer_names(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'sales' created successfully<br>";
} else {
    echo "Error creating table 'sales': " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
