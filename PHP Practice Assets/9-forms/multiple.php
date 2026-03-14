<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["login"])) {
        echo "LOGGED";
    } else if (isset($_POST["register"])) {
        echo "REGISTERED";
    }
}









?>



<form action="index.php" method="POST">

    <input type="text" name="user">
    <input type="text" name="pw">
    <input type="submit" name="login" value="Login">

</form>

<form action="index.php" method="POST">

    <input type="text" name="email">
    <input type="text" name="user">
    <input type="text" name="pw">
    <input type="submit" name="register" value="Register">

</form>