<?php



session_start();


// unset($_SESSION["password"]); // bir tanesi gider.


// session_unset(); // tüm bilgiler gider.


session_destroy(); // alayına gider. aşağıda bilgiler kullanılabilir destroylanması ufak zaman alıyor.
//or
$_SESSION = [];

?>