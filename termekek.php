<?php include('inc/header.php'); ?>

<?php
$sql = 'SELECT * FROM cars';
$result = mysqli_query($connect, $sql);
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$counter = 0;
$catArr = [
    1 => 'Porsche 911',
    2 => 'Porsche 718',
    3 => 'Porsche Panamera',
    4 => 'Porsche terepjárók'
];

session_start();
$_SESSION['car'] = 0;
?>

<div class="container-fluid" style="margin-top:50px">
    <?php if (empty($output)) : ?>
        <p class="mt-3">There are no cars for sale</p>
    <?php endif; ?>
    <?php for ($i = 0; $i < count($output); $i++) : ?>
        <?php if ($i == 0 || $i - 1 != 0 && $i % 4 == 0) : ?>
            <h3 class="h3"><?php echo $catArr[$output[$i]['type']]; ?></h3>
            <div class="row">
            <?php endif; ?>
            <div class="col-md-3 col-sm-6" id="product_card">
                <div class="product-grid9">
                    <div class="product-image9">
                        <a href="#">
                            <img class="pic-1" src="<?php echo '/images/car' . $output[$i]['index']; ?>.jpg">
                            <ul class="pic-2">
                                <li><?php echo $output[$i]['consumption']; ?> l/100 km</li>
                                <li><?php echo $output[$i]['accel']; ?> </br>Gyorsulás 0 - 100 km/h</li>
                                <li><?php echo $output[$i]['hp']; ?> Le</li>
                                <li><?php echo $output[$i]['topspeed']; ?> Végsebesség</li>
                                <li><?php echo $output[$i]['width']; ?> mm Szélesség</li>
                                <li><?php echo $output[$i]['length']; ?> Hossz</li>
                            </ul>
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><?php echo $output[$i]['name'] ?></h3>
                        <div class="price"><?php echo $output[$i]['price'] ?> EUR</div>
                        <a class="add-to-cart" href="kapcsolat.php" onclick="getName(<?php echo $i + 1 ?>);" name="clickLink">Vásárlás</a>
                    </div>
                </div>
            </div>
            <?php if ($i % 4 == 3) :  //actual math genius
            ?>
            </div>
        <?php endif; ?>
    <?php endfor; ?>

</div>

<?php include('inc/footer.php'); ?>

</body>
<script type="text/javascript">
    function getName(index) {
        console.log(index);
        document.cookie = "carName=" + index + "; path=/";
    }
</script>

</html>