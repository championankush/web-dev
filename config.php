<?php
// Hostinger MySQL Configuration
// Replace these values with your actual Hostinger database credentials

$host = 'localhost';
$dbname = 'yourusername_contact_form_db';  // Replace with your actual database name
$username = 'yourusername_contact_user';   // Replace with your actual database username
$password = 'your_strong_password';        // Replace with your actual database password

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8
mysqli_set_charset($conn, "utf8");

// Optional: Enable error reporting for development
// Comment out these lines for production
error_reporting(E_ALL);
ini_set('display_errors', 1);
?> 