<?php
session_start();

$_SESSION['username'] = 'Admin';

echo "Session variable 'username' is set successfully.";
