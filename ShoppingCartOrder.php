<?php
// Database connection parameters
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // $CatItem=$_POST['cart-items'];
    // $CatTotal=$_POST['cart-total'];
    $customerName = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardName = $_POST['cardname'];
    $cardNumber = $_POST['cardnumber'];
    $expMonth = $_POST['expmonth'];
    $expYear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $productName = $_POST['ProductName']; 
    $quantity = $_POST['quantity']; 
    $price = $_POST['price']; 
    $total = $_POST['total']; 
    
    // Calculate total price (if available)
    // This part depends on how you calculate the total price in your application

    
    // Insert data into database
    $sql = "INSERT INTO ShoppingCartOrders (CustomerName, Email, Address, City, State, Zip, CardName, CardNumber, ExpMonth, ExpYear, CVV, ProductName, Quantity, Price, Total) 
            VALUES ('$customerName', '$email', '$address', '$city', '$state', '$zip', '$cardName', '$cardNumber', '$expMonth', '$expYear', '$cvv', '$productName', $quantity, $price, $total)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully.";

        echo "<script>setTimeout(function(){window.location.href='shop.html';}, 3000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
