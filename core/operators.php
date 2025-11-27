<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php
    $a = 6;

    $b = 11;

    echo $b % $a;

    echo "<br>" . $a ** 2;

    --$b;
    echo "<br>" . $b;

    $x = 5;

    $x += 4;

    echo "<br>" . $x;
    echo "<br>";

    $p = 5; // integer
    $q = "50"; //string

    var_dump($x != $b);
    echo "<br>";
    var_dump($p === $q);
    echo "<br>logical operators<br>";

    var_dump($p < $b && $p < $a);

    $user = "admin";
    $pass = "1234";

    var_dump($user == "admin" && $pass == "1234");

    var_dump($user == "admin1" || $user == "ADMIN");

    $status = false;

    var_dump(!$status);

    $num1 = 100;
    $num2 = 20;
    $result = ($num1 > $num2) ? "Num1 is greater" : "Num2 is greater";
    echo "<br>" . $result;



    ?>



</body>

</html>