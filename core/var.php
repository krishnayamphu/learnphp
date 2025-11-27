<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php
    $a = 5;
    $b = 10;
    echo "The value of a is: $a<br>";
    echo "The sum value of a and b is: " . $a + $b . "<br>";

    $name = "John";
    $age = 25;
    ?>
    <h1>Welcome, <?php echo $name; ?>!</h1>
    <p>You are <?php echo $age; ?> years old.</p>
</body>

</html>