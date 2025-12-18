<?php
function registerUser(mysqli $conn, string $name, string $email, string $password): bool
{
    // Hash password securely
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash);
    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    return $success;
}


function authenticate(mysqli $conn, string $email, string $password): bool
{
    $sql = "SELECT id, email, password FROM users WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email']   = $user['email'];
            return true;
        }
    }
    return false;
}
