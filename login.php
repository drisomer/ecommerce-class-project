<?php
$servername = "localhost";
$username = "root"; // Enter your MySQL username
$password = ""; // Enter your MySQL password
$database = "ecommerce"; // Enter the MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL injection prevention
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query to check if the username and password exist in the database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Login successful
    session_start();
    $_SESSION['username'] = $username;
    header("location: cart.html"); // Redirect to welcome page
} else {
    // Login failed
    echo "Invalid username or password";
}

$conn->close();
?>