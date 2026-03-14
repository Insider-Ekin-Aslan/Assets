<?php


// cookie clientte session serverde tutulur.


session_start();


// // $_SESSION["username"] = "ekin";
// // $_SESSION["password"] = "12345";


if (isset($_SESSION["username"]))
    echo $_SESSION["username"] . "<br>";
if (isset($_SESSION["password"]))
    echo $_SESSION["password"] . "<br>";

echo "<pre>";



print_r($_SESSION);

echo ini_get("session.gc_maxlifetime"); // 24 DAKİKA



// $_SESSION["array"] = $filmer; array atanabilir.


?>