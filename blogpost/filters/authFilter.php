 <?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../auth/signin.php');
        exit();
    }
