<?php
if(isset($_POST['submit'])){
    $artistName = $_POST['artistName'];
    $imageTitle = $_POST['imageTitle'];
    $artistEmail = $_POST['artistEmail'];
    $cameraSpecs = $_POST['cameraSpecs'];
    $price = $_POST['price'];
    $captureDate = $_POST['captureDate'];

    $imageType = $_FILES['image1']['type'];

    $namePattern = '/([a-zA-Z]+) ([a-zA-Z]+)$/';
    $imageTitlePattern = '/^([^0-9]+)$/';
    $emailPattern = '/\w+[_]?\w+@(yahoo|gmail|evozon)\.com/';
    $pricePattern = '/^[0-9]+$/';
    $extensions = [
            'jpeg',
            'jpg',
            'png'
            ];

    if(preg_match($namePattern, $artistName) === 0)
        $errors['artistName'] = 'Incorrect name';
    if(!$artistName)
        $errors['artistName'] = 'Please write your name';

    if(preg_match($imageTitlePattern, $imageTitle) === 0)
        $errors['imageTitle'] = 'Wrong image title';
    if(!$imageTitle)
        $errors['imageTitle'] = 'Please write image title';

    if(preg_match($emailPattern, $artistEmail) === 0)
        $errors['artistEmail'] = 'Wrong format for email';
    if(!$artistEmail)
        $errors['artistEmail'] = 'Please write your email';

    if(preg_match($pricePattern, $price) === 0)
        $errors['price'] = 'Incorrect price';
    if(!$price)
        $errors['price'] = 'Please write a price';

    if(!$cameraSpecs)
        $errors['cameraSpecs'] = 'Please write camera specifications';



    list($typeOfFile, $imageExtensions) = explode('/',$imageType);
    if(strcmp($typeOfFile,'image'))
        $errors['image'] = 'Please insert an image';
    if(in_array($imageExtensions, $extensions) === false)
        $errors['image'] = 'Allowed extensions: jpeg, jpg, png';

    $artistFolder = strtr($artistName,[' ' => '']);

    if(count($_FILES) && !isset($errors)){
        if(!file_exists('/uploads/'.$artistName))
            mkdir('uploads/'.$artistFolder);
        move_uploaded_file($_FILES['image1']['tmp_name'],'uploads/'.$artistFolder.'/'.$_FILES['image1']['name']);
    }

    var_dump($_FILES);
}
?>

<html>
<head>
    <title>Admin homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>
<div id="wrapper">
    <div id="header">
        Header
    </div>

    <div class="container">
        <div class="left-menu">
            <div class="main-menu">
                <ul>
                    <li><a href="/applicationForm.php">Homepage</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <h1>Homepage</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="image_title">Image Title</label><br />
                <input id="image_title" type="text" value="Car cu boi" name="imageTitle" / required>
                <?php if (isset($_POST) && $errors['imageTitle']) {?>
                    <div style="color: red"><?php echo $errors['imageTitle'] ?></div>
                <?php } ?>

                <br />
                <label for="artist_email">Artist Email</label><br />
                <input id="artist_email" type="email" value="nicugrigo@yahoo.com" name="artistEmail" required>
                <?php if (isset($_POST) && $errors['artistEmail']) {?>
                    <div style="color: red"><?php echo $errors['artistEmail'] ?></div>
                <?php } ?>

                <br />
                <label for="artist_name">Artist Name</label><br />
                <input id="artist_name" type="text" value="Niculae Grigorescu" name="artistName" required>
                <?php if (isset($_POST) && $errors['artistName']) {?>
                    <div style="color: red"><?php echo $errors['artistName'] ?></div>
                <?php } ?>

                <br />
                <label for="camera_specs">Camera Specs</label><br />
                <input id="camera_specs" type="text" value="Pictura pe panza" name="cameraSpecs" / required>
                <?php if (isset($_POST) && $errors['cameraSpecs']) {?>
                    <div style="color: red"><?php echo $errors['cameraSpecs'] ?></div>
                <?php } ?>

                <br />
                <label for="price">Price</label><br />
                <input id="price" type="text" value="10000" name="price" / required>
                <?php if (isset($_POST) && $errors['price']) {?>
                    <div style="color: red"><?php echo $errors['price'] ?></div>
                <?php } ?>

                <br />
                <label for="capture_date">Capture Date</label><br />
                <input id="capture_date" type="date" value="" name="captureDate" / required>
                <?php if (isset($_POST) && $errors['captureDate']) {?>
                    <div style="color: red"><?php echo $errors['captureDate'] ?></div>
                <?php } ?>


                <br/>
                <br/>
                <br/>

                Image 1 <br />
                <?php if (isset($_POST) && $errors['image']) {?>
                    <div style="color: red"><?php echo $errors['image'] ?></div>
                <?php } ?>
                <input type="file" name="image1" />
                <br />
                <br />
                <input type="submit" value="Salveaza profil" name="submit"/>
            </form>
        </div>

        <div style="clear: both;"></div>
    </div>

    <div id="footer">
        Footer
    </div>
</div>

</body>
</html>
