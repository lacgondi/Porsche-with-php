<?php include('inc/header.php'); ?>

<?php
$sql = 'SELECT * FROM cars';
$result = mysqli_query($connect, $sql);
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$counter = 0;
$catArr = ['Porsche 911', 'Porsche 718', 'Porsche Panamera', 'Porsche terepjárók'];
?>

<div class="container-fluid" style="margin-top:50px">
    <?php for ($i = 0; $i < 4; $i++) : ?>
        <h3 class="h3"><?php echo $catArr[$i]; ?><h3>
                <div class="row">
                    <?php if (empty($output)) : ?>
                        <p class="mt-3">There are no cars for sale</p>
                    <?php endif; ?>
                    <?php foreach ($output as $item) : ?>
                        <!-- <php if ($item['index'] % 4 == 0 || $item['index'] == 1) : ?>
                            <div class="row">
                                <h3 class="h3"><php echo $catArr[$item['index']]; ?><h3>
                            </div>
                        <php endif; ?> -->
                        <div class="col-md-3 col-sm-6" id="product_card">
                            <div class="product-grid9">
                                <div class="product-image9">
                                    <a href="#">
                                        <img class="pic-1" src="<?php echo '/images/car' . $item['index']; ?>.jpg">
                                        <ul class="pic-2">
                                            <li><?php echo $item['consumption']; ?> l/100 km</li>
                                            <li><?php echo $item['accel']; ?> </br>Gyorsulás 0 - 100 km/h</li>
                                            <li><?php echo $item['hp']; ?> Le</li>
                                            <li><?php echo $item['topspeed']; ?> Végsebesség</li>
                                            <li><?php echo $item['width']; ?> mm Szélesség</li>
                                            <li><?php echo $item['length']; ?> Hossz</li>
                                        </ul>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><?php echo $item['name'] ?></h3>
                                    <div class="price"><?php echo $item['price']; ?> EUR</div>
                                    <a class="add-to-cart" href="kapcsolat.php">Vásárlás</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endfor; ?>
                </div>
</div>

<?php include('inc/footer.php'); ?>

</body>

</html>