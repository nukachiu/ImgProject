<?php
    $artistName = $_POST['artistName'];
    $imageTitle = $_POST['imageTitle'];
    $artistEmail = $_POST['artistEmail'];
    $cameraSpecs = $_POST['cameraSpecs'];
    $price = $_POST['price'];
    $captureDate = $_POST['captureDate'];

    var_dump($artistEmail, $artistName, $imageTitle, $price,$captureDate, $cameraSpecs);
?>
<h3>Artist name: <?php echo $artistName?></h3>
<h3>Artist email: <?php echo $artistEmail?></h3>
<h3>Image title: <?php echo $imageTitle?></h3>
<h3>Price: <?php echo $price?></h3>
<h3>Camera specs: <?php echo $cameraSpecs?></h3>
<h3>Capture date: <?php echo $captureDate?></h3>


