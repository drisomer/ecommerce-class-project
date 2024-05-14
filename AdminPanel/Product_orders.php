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

// Retrieve submitted orders from the database
$sql = "SELECT * FROM ShoppingCartOrders";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - View Orders</title>
    <!-- Head content -->
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <h2>Admin Dashboard - View Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["OrderID"] . "</td>";
                    echo "<td>" . $row["CustomerName"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["ProductName"] . "</td>";
                    echo "<td>" . $row["Quantity"] . "</td>";
                    echo "<td>" . $row["Total"] . "</td>";
                    // Add more table cells for additional data
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
