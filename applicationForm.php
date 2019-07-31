<?php
session_start();

function hashArtistName(string $artistName) : string {
    return md5($artistName);
}

if(isset($_POST['submit'])){
    $artistName = $_POST[ARTIST_NAME];
    $imageTitle = $_POST[IMAGE_TITLE];
    $artistEmail = $_POST[ARTIST_EMAIL];
    $cameraSpecs = $_POST[CAMERA_SPECS];
    $price = $_POST[PRICE];
    $captureDate = $_POST[CAPTURE_DATE];
    $tag = $_POST['tag'];
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
        $errors[ARTIST_NAME] = 'Incorrect name';
    if(!$artistName)
        $errors[ARTIST_NAME] = 'Please write your name';

    if(preg_match($imageTitlePattern, $imageTitle) === 0)
        $errors[IMAGE_TITLE] = 'Wrong image title';
    if(!$imageTitle)
        $errors[IMAGE_TITLE] = 'Please write image title';

    if(preg_match($emailPattern, $artistEmail) === 0)
        $errors[ARTIST_EMAIL] = 'Wrong format for email';
    if(!$artistEmail)
        $errors[ARTIST_EMAIL] = 'Please write your email';

    if(preg_match($pricePattern, $price) === 0)
        $errors[PRICE] = 'Incorrect price';
    if(!$price)
        $errors[PRICE] = 'Please write a price';

    if(!$cameraSpecs)
        $errors[CAMERA_SPECS] = 'Please write camera specifications';

    if(!$tag)
        $errors[TAG] = 'Please choose a tag';



    list($typeOfFile, $imageExtensions) = explode('/',$imageType);
    if(strcmp($typeOfFile,IMAGE))
        $errors[IMAGE] = 'Please insert an image';
    if(in_array($imageExtensions, $extensions) === false)
        $errors[IMAGE] = 'Allowed extensions: jpeg, jpg, png';
    if(!$_FILES['image1'])
        $errors[IMAGE] = 'Please select a photo';

    $artistFolder = hashArtistName(strtr($artistName,[' ' => '']));
    $path = sprintf("%s/%s",'uploads',$artistFolder);

    if(count($_FILES) && !isset($errors)){
        if(!file_exists('/uploads/'.$artistFolder)) {
            mkdir('uploads/' . $artistFolder);
        }
        if(move_uploaded_file($_FILES['image1']['tmp_name'],$path.'/'.$_FILES['image1']['name']) === false){
            $errors[IMAGE] = 'There was a problem while uploading the photo';
        }
        $informationJSON = json_encode($_POST);
        if(file_put_contents($path.'/'.$imageTitle.'.txt',$informationJSON) === false)
            die;

        $imageName = $_FILES['image1']['name'];
        $_SESSION[PATH_TO_JSON] = $path.'/'.$imageTitle.'.txt';
        $_SESSION[PATH_TO_IMAGE] = sprintf('%s/%s', $path,$imageName);
        header('Location: index.php?page=successPage');
    }
}
?>

<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Homepage</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="image_title">Image Title</label><br />
                <input id="image_title" type="text" value="Car cu boi" name="imageTitle" / required>
                <?php if (isset($_POST) && $errors[IMAGE_TITLE]) {?>
                    <div style="color: red"><?php echo $errors[IMAGE_TITLE] ?></div>
                <?php } ?>

                <br />
                <label for="artist_email">Artist Email</label><br />
                <input id="artist_email" type="email" value="nicugrigo@yahoo.com" name="artistEmail" required>
                <?php if (isset($_POST) && $errors[ARTIST_EMAIL]) {?>
                    <div style="color: red"><?php echo $errors[ARTIST_EMAIL] ?></div>
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
                <?php if (isset($_POST) && $errors[CAMERA_SPECS]) {?>
                    <div style="color: red"><?php echo $errors[CAMERA_SPECS] ?></div>
                <?php } ?>

                <br />
                <label for="price">Price(EURO)</label><br />
                <input id="price" type="text" value="10000" name="price" / required>
                <?php if (isset($_POST) && $errors[PRICE]) {?>
                    <div style="color: red"><?php echo $errors[PRICE] ?></div>
                <?php } ?>

                <br />
                <label for="capture_date">Capture Date</label><br />
                <input id="capture_date" type="date"value="2013-01-08" name="captureDate" / required>
                <?php if (isset($_POST) && $errors['captureDate']) {?>
                    <div style="color: red"><?php echo $errors['captureDate'] ?></div>
                <?php } ?>

                <br/>
                <label for="tag">Tag</label><br />
                <select name='tag[]' multiple="" required>
                    <option value="nature">Nature</option>
                    <option value="animals">Animals</option>
                    <option value="Cities">City</option>
                    <option value="Cars">Cars</option>
                </select>
                <?php if (isset($_POST) && $errors[TAG]) {?>
                    <div style="color: red"><?php echo $errors[TAG] ?></div>
                <?php } ?>

                <br/>
                <br/>

                Image 1 <br />
                <?php if (isset($_POST) && $errors[IMAGE]) {?>
                    <div style="color: red"><?php echo $errors[IMAGE] ?></div>
                <?php } ?>
                <input type="file" name="image1" />
                <br />
                <br />
                <input type="submit" value="Salveaza profil" name="submit"/>
            </form>
        </div>

        <div style="clear: both;"></div>
    </div>
</div>

