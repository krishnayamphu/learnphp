<?php
if (!isset($_COOKIE['user'])) {
    echo "Cookie 'user' is not set.";
    exit;
}
echo "Username: " . $_COOKIE['user'];
