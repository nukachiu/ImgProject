<?php
    session_start();
    //include 'constants.php';

    if(empty($_SESSION)) {
?>
        <h3 style="color: red">NU AI DEPRETUL SA FII AICI!!!</h3>
<?php

        die();
    }

    $imageName = $_SESSION[PATH_TO_IMAGE];
    $jsonContent = file_get_contents($_SESSION[PATH_TO_JSON]);

    $submitInformation = json_decode($jsonContent);

?>
<h3>Artist name: <?php echo $submitInformation->{ARTIST_NAME}?></h3>
<h3>Artist email: <?php echo $submitInformation->{ARTIST_EMAIL}?></h3>
<h3>Image title: <?php echo $submitInformation->{IMAGE_TITLE}?></h3>
<h3>Price: <?php echo $submitInformation->{PRICE}?></h3>
<h3>Camera specs: <?php echo $submitInformation->{CAMERA_SPECS}?></h3>
<h3>Capture date: <?php echo $submitInformation->{CAPTURE_DATE}?></h3>
<h3>Tag:<?php
    echo '<ul>';
    foreach($submitInformation->{TAG} as $item)
        echo '<li>'.$item.'</li>';
    echo '</ul>'
    ?>
</h3>

<img src ="<?php echo $_SESSION[PATH_TO_IMAGE]?>" class="img-thumbnail" width='150' height='150'>
<br />


<a href="index.php?page=applicationForm"><button>Inapoi</button></a>
<?php
    unset($_SESSION[PATH_TO_JSON]);
    unset($_SESSION[PATH_TO_IMAGE]);