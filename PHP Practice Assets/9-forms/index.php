<!-- <form action="get.php" method="GET">
    <input type="text" name="query">
    <input type="text" name="category">
    <button type="submit">Gönder</button>
</form> -->

<!-- <form action="post.php" method="POST">
    Username: <input type="text" name="username">
    Password: <input type="text" name="password">
    <button type="submit">Login</button>
</form> -->




<?php
$name = $email = $password = $city = $gender = $description = "";
$hobbies = [];

function is_valid(array $parameters)
{
    $valid = true;

    foreach ($parameters as $parameter)
        if (empty($parameter))
            $valid = false;

    if (!isset($parameters["gender"]))
        $valid = false;

    if (!isset($parameters["hobbies"]))
        $valid = false;

    if ($parameters["password"] != $parameters["password-check"])
        $valid = false;

    return $valid;
}

function control_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (is_valid($_POST)) {

        $name = control_input($_POST["name"]);
        $email = control_input($_POST["email"]);
        $password = control_input($_POST["password"]);
        $city = control_input($_POST["city"]);
        $gender = control_input($_POST["gender"]);
        $hobbies = $_POST["hobbies"];
        $description = control_input($_POST["description"]);


        echo $name . "<br>";
        echo $email . "<br>";
        echo $password . "<br>";
        echo $city . "<br>";
        echo $gender . "<br>";
        foreach ($hobbies as $hobby)
            echo $hobby . " ";
        echo "<br>";
        echo $description . "<br>";

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

    } else {
        echo "Lütfen formu eksiksiz doldurunuz.";
    }
}
?>

<form action="index.php" method="POST">
    İsim: <input type="text" name="name" value="<?php echo $name ?>"><br><br>
    E-posta: <input type="email" name="email" value="<?php echo $email ?>"><br><br>
    Şifre: <input type="password" name="password"><br><br>
    Şifre (Tekrar): <input type="password" name="password-check"><br><br>
    Şehir: <select name="city">
        <option value="35" <?php if ($city == "35")
            echo "selected" ?>>İzmir</option>
        <option value="38" <?php if ($city == "38")
            echo "selected" ?>>Kayseri</option>
        <option value="48" <?php if ($city == "48")
            echo "selected" ?>>Muğla</option>
    </select><br><br>
    Cinsiyet:
    Erkek <input type="radio" name="gender" value="male" <?php if ($gender == "male")
            echo "checked" ?>>
    Kadın <input type="radio" name="gender" value="female" <?php if ($gender == "female")
            echo "checked" ?>><br><br>
    Hobiler:
    <input type="checkbox" name="hobbies[]" value="cinema" <?php if (isset($hobbies) && in_array("cinema", $hobbies))
            echo "checked" ?>> Sinema izlemek
    <input type="checkbox" name="hobbies[]" value="reading" <?php if (isset($hobbies) && in_array("reading", $hobbies))
            echo "checked" ?>> Kitap okumak
    <input type="checkbox" name="hobbies[]" value="painting" <?php if (isset($hobbies) && in_array("painting", $hobbies))
            echo "checked" ?>> Resim yapmak
    <br><br>
    Açıklama:<br><textarea name="description"><?php echo $description ?></textarea><br><br>

    <button type="submit">Üye Ol</button>
</form>