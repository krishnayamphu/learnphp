<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnphp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "UPDATE users SET email='" . $email . "', password='" . $password . "' WHERE id=" . $id;
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    //echo "Record updated successfully";
    header('location:users.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
