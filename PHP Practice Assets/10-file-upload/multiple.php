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


    if ($_FILES["file"]["error"][0] == 4) {
        echo "Lütfen dosya yükleyiniz.";
        return;
    } else if (count($_FILES["file"]["name"]) > 3) {
        echo "Lütfen üçten fazla dosya yüklemeyiniz.";
        return;
    }

    for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {

        if ($_FILES["file"]["size"][$i] > 5000000) {
            echo "Dosya boyutu çok büyük.";
            return;
        } else if (explode(".", $_FILES["file"]["name"][$i])[1] != "png") {
            echo "Lütfen PNG formatında dosya yükleyiniz.";
            return;
        }

        if (
            move_uploaded_file($_FILES["file"]["tmp_name"][$i], "./uploaded-files/" . md5(
                time() . "-" . explode(".", $_FILES["file"]["name"][$i])[0]
            ) . ".png")
        )
            echo "Dosya yüklendi. [" . $_FILES["file"]["name"][$i] . "]<br>";
        else
            echo "Bir dosya yüklenirken hata oluştu!<br>";

    }



}


?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" multiple="multiple" name="file[]">
    <input type="submit" value="Upload" name="upload">
</form>