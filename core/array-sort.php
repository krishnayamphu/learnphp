<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php
    $cars = ["BMW", "Audi", "Mercedes"];
    //sorting array
    //sort($cars);
    rsort($cars);
    var_dump($cars);

    echo "<br>";
    $mobiles = array("Samsung S25" => 2000, "Iphone 17 Pro" => 2200, "OnePlus N50" => 700);

    //sorting associative array
    // asort($mobiles);
    // arsort($mobiles);
    // ksort($mobiles);
    krsort($mobiles);

    var_dump($mobiles);



    ?>

</body>

</html>