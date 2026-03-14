<?php

// echo date("Y/m/d");


// echo strlen("hello world!");


// function greet($name)
// {
//     echo "Hello " . $name . "<br>";

//     return 5;
// }


// echo greet("Ekin") . "<br>";

// echo $name; // undefined geldi







// function displayValue($value = "DEFAULT")
// {
//     echo $value . "<br>";
// }


// displayValue("ALO");
// displayValue();




// function echoAll(...$arguments) // echoAll($mainMessage, ...$arguments)
// {
//     $message = "";
//     foreach ($arguments as $argument) {
//         $message .= $argument . " ";
//     }

//     echo $message . "<br>";
// }



// echoAll(
//     "hello",
//     0,
//     "world",
//     "!",
//     true
// );





// function transf($transform, $message)
// {
//     echo $transform($message);
// }


// transf("strtoupper", "zdravo turske!");







// $x = 5;
// $y = 4;

// $z = 3;

// function myTest()
// {
//     global $x, $y;
//     // echo $x; // error

//     echo $y . "<br>";

//     echo $GLOBALS["z"];
// }

// myTest();



// function test()
// {
//     static $start_value = 0;

//     echo ++$start_value . "<br>";
// }


// test();
// test();
// test();
// test();






// $original = 10;
// echo "Original Start Value - " . $original . "<br>";


// function addFive($num)
// {
//     $num += 5;
// }
// function addFiveWithReference(&$num)
// {
//     $num += 5;
// }



// addFive($original);
// echo $original . "<br>";


// addFiveWithReference($original);
// echo $original . "<br>";





// $list = [1, 3, 5];

// $copyList = $list; // copies literally

// $refList = &$list; // points same list


// array_push($list, 10);


// print_r($list);
// print_r($copyList);
// print_r($refList);



// $number = 5;
// $ref = &$number; // sayılar için bile geçerli

// $ref += 17;

// echo $number;






// function intro()
// {
//     $parametre = func_num_args();

//     if ($parametre == 0) {
//         echo "Add sth bruh";
//     } else {
//         foreach (func_get_args() as $d) {
//             echo $d . "<br>";
//         }
//         // echo func_get_arg(0);
//         // echo func_get_arg(1);
//     }

//     echo "<br>";

// }


// intro("Ekin", "Aslan");
// intro();





// declare(strict_types=1);
// function addNums(int $a, int $b)
// {
//     echo $a + $b;
// }


// addNums(10, 20);

// addNums("10", "20"); // declare ile olmaz



// declare(strict_types=1);
// function returnNum($a, $b): int
// {
//     return $a + $b;
// }


// echo returnNum(10, 20);

// echo returnNum(10.5, 20); // declare ile olmaz




// $new_item["C"] = 23; // hiç yoktan idli array ifadesi tanımlama

// print_r($new_item);






// $list = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];


// $list = array_filter($list, function ($item) {
//     return $item > 4;
// });

// print_r($list);

// echo var_dump(stristr("hello world!", "alo")); filterda kullanılabilir bir fonk.


?>