<?php
    session_start();
    include 'constants.php';

    $imageName = $_SESSION[PATH_TO_IMAGE];
    $jsonContent = file_get_contents($_SESSION[PATH_TO_JSON]);

    $submitInformation = json_decode($jsonContent);
?>
<html>
<head>
    <title>Admin homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <h3>Artist name: <?php echo $submitInformation->{ARTIST_NAME}?></h3>
    <h3>Artist email: <?php echo $submitInformation->{ARTIST_EMAIL}?></h3>
    <h3>Image title: <?php echo $submitInformation->{IMAGE_TITLE}?></h3>
    <h3>Price: <?php echo $submitInformation->{PRICE}?></h3>
    <h3>Camera specs: <?php echo $submitInformation->{CAMERA_SPECS}?></h3>
    <h3>Capture date: <?php echo $submitInformation->{CAPTURE_DATE}?></h3>

    <img src ="<?php echo $_SESSION[PATH_TO_IMAGE]?>" class="img-thumbnail" width='150' height='150'>


</body>
</html>

