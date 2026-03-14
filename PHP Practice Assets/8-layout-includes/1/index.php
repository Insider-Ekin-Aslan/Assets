<?php
//require("_variables.php")
?>

<?php require "_variables.php" ?>

<div>
    <?php greet(); ?>
</div>

<p>Hello world,
    <?php echo $name ?>.
</p>

<?php require "_content.php" ?>

<?php // require "_context.php" // gives error ?>


<?php include "_conbilibili.php" // fatal değil warning verir. ?>

<!-- 


require - önemli import edilecek dosyalar için

include - düzeni bozmayan ikincil componentler için

-->


<?php include_once "_once.php" ?>
<?php include_once "_once.php" ?>
<?php require_once "_once.php" ?>
<?php require_once "_once.php" ?>