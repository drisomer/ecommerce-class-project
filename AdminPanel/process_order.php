<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$address = $_POST['address'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$country = $_POST['country'];
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];

// SQL query to insert data into the orders table
$sql = "INSERT INTO orders (customer_name, email, phone, product_name, quantity, price, address, city, zipcode, country, card_number, expiry_date, cvv) 
        VALUES ('$customer_name', '$email', '$phone', '$product_name', '$quantity', '$price', '$address', '$city', '$zipcode', '$country', '$card_number', '$expiry_date', '$cvv')";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
