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
if(isset($_POST['submit'])) {
    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Image upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $imageName = uniqid() . '.' . $imageFileType;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $imageName)) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO blog_posts (title, content, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $imageName);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Blog added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
        header("refresh:2;url=add_blog.html");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close database connection
$conn->close();
?>
