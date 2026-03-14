<?php


setcookie("username", "ekin", time() + 60);
setcookie("fullname", "Ekin Aslan", time() + 60, "/11-cookies/admin/");




//setcookie("test", "value", time() + 99999999);
setcookie("test", "value", time() - 1);





setcookie("auth[un]", "hello", time() + 3600);
setcookie("auth[pw]", "world", time() + 3600);

echo $_COOKIE["auth"]["un"] . " - " . $_COOKIE["auth"]["pw"];


?>