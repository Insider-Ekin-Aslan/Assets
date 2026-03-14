<?php


if (isset($_POST["upload"]) && $_POST["upload"] == "Upload")
    if (!$_FILES["file"]["error"] == 0)
        upload();
    else
        echo "Hata!";



function upload()
{

    echo "<pre>";
    print_r($_FILES["file"]);

    if (empty($_FILES["file"]["name"])) {
        echo "Lütfen dosya yükleyiniz.";
        return;
    } else if ($_FILES["file"]["size"] > 500000) { // byte cinsinden
        echo "Dosya boyutu çok büyük.";
        return;
    } else if (explode(".", $_FILES["file"]["name"])[1] != "png") {
        echo "Lütfen PNG formatında dosya yükleyiniz.";
        return;
    }



    // time() is not good enough but aight
    if (
        move_uploaded_file($_FILES["file"]["tmp_name"], "./uploaded-files/" . md5(
            time() . "-" . explode(".", $_FILES["file"]["name"])[0]
        ) . ".png")
    )
        echo "Dosya yüklendi.";
    else
        echo "Hata!";


}


?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload" name="upload">
</form>