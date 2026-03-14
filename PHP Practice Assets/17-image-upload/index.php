<?php


// bi fark yok

// sonra databaseye ismi koyuyon

if (!isset($_POST["upload"]))
    echo "<hr><br>
    <form method='POST' enctype='multipart/form-data'>
        <label for='image'>Image</label>
        <input type='file' name='image'>
        <br><br>
        <input type='submit' name='upload' value='Gönder'>
    </form>";
else {

    $image = $_FILES["image"];

    if (empty($image))
        die("Empty File");

    if ($image["type"] != "image/png")
        die("Wrong Format");

    if ($image["size"] > 1024 * 5)
        die("Image Must Lower Than 5MB");

    if (move_uploaded_file($image["tmp_name"], "./images/" . $image["name"]))
        echo "<b>File Uploaded!</b>";
    else
        die("Upload Error");



    echo "<pre>";
    print_r($_FILES["image"]);
    echo "</pre>";

}

?>