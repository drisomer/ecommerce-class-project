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

// Check if form is submitted
if(isset($_POST['submit_comment'])) {
    // Get form data
    $postId = $_POST['postId']; // Get postId from the form
    $commentText = $_POST['commentText']; // Corrected variable name
    
    // Insert comment data into database
    $sql = "INSERT INTO comments (post_id, comment) VALUES ('$postId', '$commentText')";

    if ($conn->query($sql) === TRUE) {
        echo "Comment posted successfully!";
        header("Location: blog.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
