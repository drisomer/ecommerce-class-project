<?php
// Establish a database connection (Replace with your actual database credentials)
$servername = "localhost";
$username = "username";
$password = "";
$database = "ecommerce";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch products based on category
function getProductsByCategory($category) {
    global $conn;
    $category = $conn->real_escape_string($category);

    $sql = "SELECT * FROM products WHERE category='$category'";
    $result = $conn->query($sql);

    $products = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

// Get selected category from the request
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Fetch products based on the selected category
$products = getProductsByCategory($category);

// Close database connection
$conn->close();

// Return product data as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
