<?php

function readImg(array $payLoad1){
    $imagePath = $payLoad1[INPUT_FILE];
    
    $img = new Imagick($imagePath);
    
    array_shift($payLoad1);
    $payLoad2 = $payLoad1 + [IMAGE => $img];

    return $payLoad2;
}
