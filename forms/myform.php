<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<?php
$username = $_GET['username'];
echo $username;
?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <input type="text" name="username" placeholder="Username">
        <button type="submit">Submit</button>
    </form>
</body>

</html>