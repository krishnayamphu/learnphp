<?php
session_start();
require "../../config/connect_db.php";

$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = valid_input($_POST['email']);
    $password = valid_input($_POST['password']);

    $pattern = '/^[a-z0-9][a-z0-9_]{0,28}[a-z0-9]$/i';

    if (empty($email)) {
        $_SESSION['emailErr'] = "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
        }
    }

    if (empty($password)) {
        $_SESSION['passwordErr'] = "Password is required";
    }

    $hash = sha1($password);
    $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $hash . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        header('location:../../admin/index.php');
    } else {
        $_SESSION['err'] = "Invalid email or password.";
        header('location:../../auth/signin.php');
    }
}

function valid_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

mysqli_close($conn);
