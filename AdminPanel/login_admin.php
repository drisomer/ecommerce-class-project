<?php
// Start session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; // 
$database = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement to retrieve admin record
    $sql = "SELECT * FROM adminlogin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if a record exists
    if ($result->num_rows == 1) {
        // Valid credentials, set session variable
        $_SESSION["admin"] = $username;

        // Redirect to dashboard
        header("Location: dashboard.html");
        exit();
    } else {
        // Invalid credentials, redirect back to login page
        header("Location: login_admin.html"); // Replace with the actual login page
        exit();
    }
}

// Close connection
$conn->close();
?>
