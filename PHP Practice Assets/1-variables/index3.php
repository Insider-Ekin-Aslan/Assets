<?php


echo "sonuç " . (10 + 5) . "<hr>";

echo 22 / 7 . "<hr>";

echo var_dump(is_int(10)) . "<br>";

echo var_dump(is_int(10.23)) . "<br>";


echo var_dump(is_float(10)) . "<br>";

echo var_dump(is_float(10.23)) . "<br>";



echo var_dump(is_numeric("1421423"));

echo " -> " . abs(-58) . ", " . ceil(4.13) . ", " . floor(3.99) . ", " . round(17.5) . "<hr>";

echo sqrt(81) . " - " . pow(2, 7) . " - " . max(3, 33, 2, 6) . " - " . min(3, 33, 123, 55);

echo "<hr><hr><hr> <br>";






define("bağlantı", "mssql");


define("define", 'HAHAHA');



echo bağlantı;

echo define; // ????????????


echo "<hr>";


$str = "lorem ipsum dolor sit amet adipisizing elit.";


echo substr($str, 5) . "<br>";
echo substr($str, -5) . "<br>";

echo substr($str, 0, 5) . "<br>";
echo substr($str, 0, -3) . "<br>";

echo "+" . substr($str, -5, 4) . "+<br>";

echo substr($str, -511) . "<br>"; // 511 kıça götürüyor bundan dolayı str kalmıyor, -511 de starta götürüyor.


const başlık = "XBAŞLIK";

echo başlık;



// echo "<a href=\"$sth\"></a>"; error veriyor direkt bilinmeyen variable yazınca

?>