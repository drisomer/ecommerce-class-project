<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ecommerce";
    
    $conn = new mysqli($servername, $username, $password, $database);


    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into products table
    $stmt = $conn->prepare("INSERT INTO products (name, product_brand, price, description, image_url, created_at, updated_at, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsssss", $name, $product_brand, $price, $description, $image_url, $created_at, $updated_at, $section);


    // Set parameters
    $name = $_POST['name'];
    $product_brand = $_POST['product_brand'];

    // Format price value
    $price = $_POST['price'];
    $price = floatval(preg_replace("/[^0-9.]/", "", $price));
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];
    $section = $_POST['section'];

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
