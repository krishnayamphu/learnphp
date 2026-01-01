<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "krishnayamphu@gmail.com";
    $name = trim($_POST['name'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message   = trim($_POST['message'] ?? '');
    $data = $name . "<br>" . $message;
    mail($to, $subject, $data);
    echo "Mail send";
}
