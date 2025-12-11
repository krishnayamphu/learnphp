<?php
session_start();
require "../../config/connect_db.php";

$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = valid_input($_POST['name']);
    $email = valid_input($_POST['email']);
    $password = valid_input($_POST['password']);

    $pattern = '/^[a-z0-9][a-z0-9_]{0,28}[a-z0-9]$/i';

    if (empty($name)) {
        $_SESSION['nameErr'] = "Name is required";
    } else {
        if (!preg_match($pattern, $name)) {
            $_SESSION['nameErr'] = "Invalid name";
        }
    }

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


    $sql = "INSERT INTO users (name,email,password) VALUES ('" . $name . "','" . $email . "','" . $password . "')";
    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
