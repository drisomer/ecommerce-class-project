<?php
include 'db.php';

// Register
if ($_SERVER["RESQUEST_METHOD"] == "POST") {
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Hashing password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$host = "localhost";
$dbname = "exprstores";
$username = "root";
$password = "";

try{
    $db = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Inserting users to database
    $stmt = $db->prepare("INSERT INTO users (name, username, email, password)
    VALUES(:name, :username, :email, :password)");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam("username", $username);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("password", $hashed_password);
    $stmt->execute();
    echo "<h2> User registration successful </h2>";
    echo "Thank you for creating an account to express stores," . $name . "!<br>";
    echo "We are redirecting you to login page in 3 seconds";
    header("refresh:3;url=login.html");

}
catch(PDOException $e) {
    echo "Connection failed:". $e->getMessage();
}
}


?>
