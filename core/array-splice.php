<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php

    $a = ["red", "green", "blue", "yellow"];
    $b = ["orange", "black"];
    array_splice($a, 2, 1, $b);
    var_dump($a);



    ?>

</body>

</html>