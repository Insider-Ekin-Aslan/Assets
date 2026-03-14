<?php

// // NÜMERİK DİZİ

// $arr = array("bmw", "toyota", "mercedes");

// echo $arr[2] . "<br>";

// $num = array(1, 2, 3, 4, 5);

// $num[2] = "üç";

// echo "$num[2]<br>";



// $markalar = "bmw,renault,volvo";

// $markalar = explode(",", $markalar);

// echo "$markalar[1] <hr><br>";




// // ASSOCIATIVE DİZİ



// $plaka = array(41 => "Kocaeli", 38 => "Kayseri", 48 => "Muğla");


// echo "$plaka[48] <br>";

// $plaka[35] = "İzmir";

// echo "$plaka[35] <hr> <br>";



// // ÇOK BOYUTLU DİZİ

// $multi = array("numkey" => array(1, 2, 3, 4, 5), "alpha" => array("a", "b", "c", "d"));

// echo "hello this is {$multi["numkey"][1]} <hr> <br>";



// $sayilar = array(1, 2, 33, 4, 55, 6, 7, 88, 9);


// echo count($sayilar) . "<br>";

// sort($sayilar);

// // rsort($sayilar); azalan


// print_r($sayilar);
// echo "<br>";


// $users = array("vnymea" => "1- Ekin Aslan", "efeko" => "3- Efe Aslan", "ayekin" => "2- Ayfer Çetinkaya");


// asort($users);

// print_r($users);
// echo "<br>";


// ksort($users);
// print_r($users);

// echo "<br><br>";





// $str = "Ekin|Aslan|duvara|yaslan.";

// $strarr = explode("|", $str);

// echo $strarr[1] . "<br>" . implode(" -> ", $strarr) . "<br>";


// shuffle($strarr);
// print_r($strarr);
// echo "<br> <br>";


// $keyss = array(7 => "a", 6 => "b", 5 => "c", 4 => "d", 3 => "e");


// $valuess = array("aa", "cc" => "dd", "ee" => "ff", "gg" => "hh", "jj"); // key olmamasına rağmen yine de alıyor


// $concat = array_combine($keyss, $valuess); // kombinlerken her türlü valueleri alıyor; concat yapmıyor!!!

// print_r($concat);
// echo "<br>";


// echo $valuess[1] . " - " . $valuess[0]; // ALIYOR LEEEN

// echo "<br> <br>";




// $realConcat = array_merge($keyss, $valuess);

// print_r($realConcat);
// echo "<br>";


// $tekrar = array("a", "b", "c", "a", "b", "a");

// print_r(array_count_values($tekrar));
// echo "<br><br>";

// array_push($num, "KAZANIYORUUUUUUZ!");
// array_unshift($num, "KAVALA DEMİRTAŞ");


// print_r($num);






// $keys = array(
//     "test" => "12345",
//     "uat" => "34512",
//     "prod" => "54321"
// );



// array_splice($keys, 1, 1);


// echo "<pre>";
// print_r($keys);
// echo "</pre";







// $a = array(1, 2, 3) + array(4, 5, 6); // ??????

// print_r($a);



?>