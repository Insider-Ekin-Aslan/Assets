<?php

$connection = mysqli_connect("localhost", "root", "", "php_course");
mysqli_set_charset($connection, "UTF8");

if (mysqli_connect_errno() > 0) {
    die("Error no: " . mysqli_connect_errno());
}

?>