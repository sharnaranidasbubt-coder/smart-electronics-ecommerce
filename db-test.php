<?php
// Database connection test for Smart Electr
$conn = new mysqli('localhost', 'smart_wp_user', 'SmartWP@2025!Secure', 'smart_electronics_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "✓ Database connection successful!<br>";
echo "Server version: " . $conn->server_info . "<br>";
echo "Database info: " . $conn->host_info . "<br>";

// Test basic query
$result = $conn->query("SHOW TABLES");
if ($result) {
    echo "✓ Query execution successful!<br>";
    echo "Tables in database:<br>";
    while ($row = $result->fetch_row()) {
        echo "- " . $row[0] . "<br>";
    }
} else {
    echo "✗ Query failed: " . $conn->error . "<br>";
}

$conn->close();
?>
