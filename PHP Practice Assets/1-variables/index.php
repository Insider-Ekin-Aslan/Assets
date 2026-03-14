<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php // $title = "PHP Dersleri" ?>

    <!-- <h1>
        <?php // echo $title ?>
    </h1> -->


    <?php

    $prod1 = 5000;
    $prod2 = 6000;

    $str = "Ekinoski";

    $justinBiebers_chubbyDouble = 100.23;

    $isIt = true;


    $a = (double) 20;
    $b = (int) 17.99999;
    $c = (int) "50"; // a20 falan yaparsan değer 0 oluyor, 20sasdadasafsdfs yaparsan 20yı parseliyor.
    $d = (int) "50.69";
    $e = (double) "12.12";

    /*

    true -int-> 1
    false -int-> 0


    */


    echo $prod2 * 1.18 . " " . "HELLO";

    echo "<br>" . gettype($justinBiebers_chubbyDouble);

    echo "<br><br>" . $a . " " . $b . " " . $c . " " . $d . " " . $e;


    ?>
</body>

</html>