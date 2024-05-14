<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select messages
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

// Check if there are any messages
if ($result->num_rows > 0) {
    $messages = array();
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    // Output messages as JSON
    echo json_encode($messages);
} else {
    echo "No messages found.";
}

// Close connection
$conn->close();
?>
