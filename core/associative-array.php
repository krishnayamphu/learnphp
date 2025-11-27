<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php

    $employee = array(
        "name" => "John Doe",
        "age" => 30,
        "position" => "Software Engineer",
    );

    echo "Name: " . $employee["name"] . "<br>";

    foreach ($employee as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }


    $students = ["Alice" => 85, "Bob" => 92, "Charlie" => 78];
    foreach ($students as $student => $score) {
        echo $student . " scored " . $score . "<br>";
    }
    ?>

</body>

</html>