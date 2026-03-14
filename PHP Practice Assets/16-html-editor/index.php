<main id="editor" style="height: 300px">
    Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>Incidunt aliquam rerum sequi quia accusantium
    sunt?<br>Vitae nesciunt quo assumenda commodi modi deleniti dolorum. Est provident, quia illum nam saepe blanditiis?
</main>


<?php include "ckeditor.php"; ?>






<?php


$input = "<b>hello, do not redeem it.</b>";

$send = htmlspecialchars($input);

$outcome = htmlspecialchars_decode($send);

echo $send . "<br>" . $outcome;

?>