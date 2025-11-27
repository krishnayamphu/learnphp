<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php

    // $age = array(40, 50, 60);
    $age = [40, 50, 60];

    echo $age[1];

    // for ($i = 0; $i <= 2; $i++) {
    //     echo "<br>" . $age[$i];
    // }

    foreach ($age as $value) {
        echo "<br>Age: " . $value;
    }

    $colors = array("red", "green", "blue", "yellow");
    foreach ($colors as $v) {
        echo "<br>Color: " . $v;
    }

    echo "<br>";
    var_dump($colors)
    ?>

</body>

</html>