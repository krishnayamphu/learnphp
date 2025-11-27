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

    // echo is_int($a); // true
    var_dump(is_int($a));
    var_dump(PHP_INT_MAX);
    var_dump(PHP_INT_MIN);
    var_dump(PHP_INT_SIZE);

    $x = 1.9e411;
    var_dump(is_infinite($x));

    $x = acos(8);
    var_dump($x);



    $x = 5985;
    var_dump(is_numeric($x));

    $x = "5985";
    var_dump(is_numeric($x));
    $x = "59.85" + 100;
    var_dump(is_numeric($x));

    $x = "Hello";
    var_dump(is_numeric($x));
    ?>



</body>

</html>