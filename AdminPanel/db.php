<?php
// Check if session is not active, then start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("db.php");

// Now you can use the $conn variable to execute database queries in your admin dashboard files.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exprstores";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection

if ($conn->connect_error){
    echo "Failed to connect DB"  .$conn->connect_error;
}
?>