<?php

// config.php - Database connection configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'coffee_admin');
define('DB_PASS', 'your_secure_password'); // Update with your secure password
define('DB_NAME', 'coffee_shop_db');

// Connect to database
function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Session handling


// User authentication
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

// Sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>