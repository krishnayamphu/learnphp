<?php
session_start();
require "../../config/connect_db.php";

$name = $slug = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = valid_input($_POST['name']);
    $slug = valid_input($_POST['slug']);
    $description = valid_input($_POST['description']);

    $pattern = '/^[a-z0-9][a-z0-9_]{0,28}[a-z0-9]$/i';
    $slug_pattern = '~^[a-z0-9-]+$~';

    if (empty($name)) {
        $_SESSION['nameErr'] = "Name is required";
    } else {
        if (!preg_match($pattern, $name)) {
            $_SESSION['nameErr'] = "Invalid name";
        }
    }

    if (empty($slug)) {
        $_SESSION['sluglErr'] = "Slug is required";
    } else {
        if (!preg_match($slug_pattern, $slug)) {
            $_SESSION['slugErr'] = "Invalid slug format";
        }
    }

    $sql = "INSERT INTO category (name,slug,description) VALUES ('" . $name . "','" . $slug . "','" . $description . "')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Data Inserted Successfully";
        header('location:../../admin/category/index.php');
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
