<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>

<body>


    <?php

    for ($i = 1; $i <= 5; $i++) {
        if ($i == 2 || $i == 4) {
            continue;
        }
        echo "The number is: $i <br>";
    }
    echo "<hr>";

    for ($i = 1; $i <= 5; $i++) {
        echo "The number is: $i <br>";
        if ($i == 3) {
            break;
        }
    }

    ?>

</body>

</html>