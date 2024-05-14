<?php
// Database credentials
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

// Retrieve comments from the database
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["post_id"] . "</td>";
        echo "<td>" . $row["comment"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No comments found.</td></tr>";
}

// Close database connection
$conn->close();
?>
