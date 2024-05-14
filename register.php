<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; //L
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
    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $email = $conn->real_escape_string($_POST['email']);

    // Insert user data into database
    $sql = "INSERT INTO users (username, password, fullName, email) VALUES ('$username', '$password', '$fullName', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
