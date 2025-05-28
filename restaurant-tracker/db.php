<?php
$host = "localhost";
$user = "root";
$pass = "root"; // Default MAMP MySQL password
$dbname = "restaurant"; // Make sure you created this in phpMyAdmin

$conn = new mysqli($host, $user, $pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected to the database!";
}
?>
