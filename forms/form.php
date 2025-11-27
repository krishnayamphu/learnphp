<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<?php
$username = $email = $gender = $address = "";
$usernameErr = $emailErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = valid_input($_POST['username']);
    $email = valid_input($_POST['email']);
    $gender = valid_input($_POST['gender']);
    $address = valid_input($_POST['address']);

    if (empty($username)) {
        $usernameErr = "Username is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            $usernameErr = "Only letters and white space allowed";
        }
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($gender)) {
        $genderErr = "Gender is required";
    }

    echo "<h2>Your Input:</h2>";
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Address: " . $address . "<br>";
}

function valid_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php if ($usernameErr) {
            echo "<span style='color:red'>$usernameErr</span><br>";
        } ?>

        <input type="text" name="username" placeholder="Username" required>
        <br>
        <?php if ($emailErr) {
            echo "<span style='color:red'>$emailErr</span><br>";
        } ?>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <?php if ($genderErr) {
            echo "<span style='color:red'>$genderErr</span><br>";
        } ?>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="m" required>Male
        <input type="radio" name="gender" value="f" required>Female
        <br>
        <textarea name="address" placeholder="Address"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>