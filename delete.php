<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];
$sql = "DELETE FROM users_products WHERE item_id = $id";

if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
   header("Location:deleteproduct.php");
} else {
    echo "Error deleting record: " . $conn->error;
}


} else {
    echo "Error deleting record: " . $conn->error;
}








?>
