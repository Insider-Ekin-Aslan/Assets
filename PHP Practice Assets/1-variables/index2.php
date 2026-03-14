<?php

$sayi1 = 10;
$sayi2 = 20;

$category = "?";


$mesaj = "abc'def\"ghi $category +\$    {$sayi2} - " . "{" . $sayi2 . "}";


echo $sayi1 . $sayi2 . "<br>" . "<img src=\"heeyo.jpg\">" . "<br>" . $mesaj . "<br>";


echo "abcdef"[4] . strlen("abcd") . " - " . str_word_count("hello ekin aslan") . "<br>";


echo strtolower("EKİN ASLAN IĞDIR ŞELALE"); // PUH AMK

echo "<br>" . strtoupper("ekin aslan ığdır şelale") . " - " . ucfirst("ekin") . "<br><br>";

echo str_replace(["a", "ekin"], ["A", "EKİN!"], "ekin aslan duvara yaslan")

    ?>