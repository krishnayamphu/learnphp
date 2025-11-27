<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "No session found. Please session set first.";
    // exit;
}
$username = $_SESSION['username'];
echo "Username:  $username";
