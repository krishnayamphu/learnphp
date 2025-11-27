<?php session_start();


$email = $password = "";
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = valid_input($_POST['email']);
    $password = valid_input($_POST['password']);

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    if ($email == "admin@email.com" && $password == "admin123") {
        $_SESSION['email'] = $email;
        header("location: welcome.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}

function valid_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <h4>Sign In</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email address" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>