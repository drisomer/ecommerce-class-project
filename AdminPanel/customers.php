<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve customer information
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Array to store user data
$users = [];

// Fetch user data and store in array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close database connection
$conn->close();

// Output the user data as JSON
echo json_encode($users);
?>
