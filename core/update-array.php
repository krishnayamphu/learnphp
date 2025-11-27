<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php

    $mobiles = ["iPhone", "Samsung"];

    // Updating an element in the array
    foreach ($mobiles as &$value) {
        $value = "OnePlus";
    }
    unset($value); // Break the reference with the last element
    // var_dump($mobiles);


    $cars = ["BMW", "Audi", "Mercedes"];
    // Updating an element in the array using index
    array_push($cars, "Toyota");
    // var_dump($cars);

    echo $cars[3];
    echo "<hr>";
    foreach ($cars as $car) {
        echo "<br>" . $car;
    }

    echo "<hr>";
    array_pop($cars);
    var_dump($cars);
    echo "<hr>";
    print_r(count($cars));




    ?>

</body>

</html>