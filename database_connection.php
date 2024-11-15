<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "resort_booking"; // Database name

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
mysqli_query($conn, $sql);

// Select the database
mysqli_select_db($conn, $database);

// Create users table
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
     email varchar(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
   
    role ENUM('admin', 'user') NOT NULL
)";

mysqli_query($conn, $sql_users);

// Insert default admin user
$sql_admin = "INSERT INTO users (username, password, role) VALUES 
    ('admin', '" . password_hash("1234", PASSWORD_DEFAULT) . "', 'admin')
    ON DUPLICATE KEY UPDATE username=username";

mysqli_query($conn, $sql_admin);

// Create bookings table
$sql_bookings = "CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    booking_date DATE,
    room_type VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

mysqli_query($conn, $sql_bookings);
?>