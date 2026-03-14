<?php

$isLogged = false;

?>


<!-- <?php if ($isLogged): ?>

    <h1>Logged</h1>

<?php endif; ?> -->




<!-- <?php if ($isLogged): ?>

    <h1>Logged</h1>

<?php else: ?>

    <h1>Login</h1>

<?php endif; ?> -->






<!-- <?php if ($isLogged) { ?>

    <h1>Logged</h1>

<?php } else { ?>

    <h1>Login</h1>

<?php } ?> -->



<?php

// if (true):               Syntax böyle de olabiliyormuş
//     echo "hello";
// else:
//     echo "world";
// endif

?>







<!-- 



<?php for ($i = 0; $i < 10; $i++): ?>

<h2>Heloooo</h2>

<?php endfor; ?>

<?php

echo $i; // hala globallik geçerli

for ($i = 0; $i < 10; $i++):
    echo "he";
endfor;

$urunler = ["a", "b", "c", "d"];

?>


<?php foreach ($urunler as $urun): ?>

<p style="background-color: <?php if ($urun == 'c') {
            echo "darkred";
        } else {
            echo "green";
        } ?>">
    <?php echo $urun ?>
</p>

<?php endforeach; ?>


<?php

foreach ($urunler as $urun):
    echo "ÜRÜN-" . $urun;
endforeach;

?> -->