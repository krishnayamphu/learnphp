<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php
    //if()
    $temp = 2;
    if ($temp <= 10) {
        echo "It's cold outside.";
    }


    //if...else
    $marks = 8;
    if ($marks >= 35) {
        echo "<br>You have passed the exam.";
    } else {
        echo "<br>You have failed the exam.";
    }

    $username = "admin";
    $password = "12345";
    if ($username == "admin" && $password == "123456") {
        echo "<br>Login successful.";
    } else {
        echo "<br>Invalid username or password.";
    }

    //if...elseif...else
    date_default_timezone_set("Asia/Kathmandu");
    echo date_default_timezone_get();
    $t = date("H");

    if ($t < "10") {
        echo "Have a good morning!, " . $t;
    } elseif ($t < "20") {
        echo "Have a good day! " . $t;
    } else {
        echo "Have a good night!" . $t;
    }

    ?>



</body>

</html>