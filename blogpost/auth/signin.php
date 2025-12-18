<?php
session_start();

require "../config/connect_db.php";
require "../dao/user_functions.php";

if (isset($_SESSION['user_id'])) {
    header("Location: /learnphp/blogpost/admin/index.php");
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '') {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if ($password === '') {
        $errors['password'] = 'Password is required';
    }

    if (empty($errors)) {
        if (authenticate($conn, $email, $password)) {
            header("Location:/learnphp/blogpost/admin/index.php");
            exit;
        } else {
            $errors['general'] = "Invalid email or password";
        }
    }
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
            <div class="col-lg-6">
                <h3>Sign In</h3>
                <form method="post">
                    <?php if (!empty($errors['general'])): ?>
                        <div class="alert alert-danger">
                            <?= $errors['general'] ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($email ?? '') ?>">
                        <?php if (!empty($errors['email'])): ?>
                            <small class="text-danger"><?= $errors['email'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php if (!empty($errors['password'])): ?>
                            <small class="text-danger"><?= $errors['password'] ?></small>
                        <?php endif; ?>
                    </div>

                    <button class="btn btn-primary">Sign In</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>