<?php

function readImg(array $payLoad1){
    $imagePath = $payLoad1['input-file'];

    /**
     * @var \Imagick $img
     */
    $img = new Imagick($imagePath);

    /**
     * @var \Imagick $payLoad2['image']
     */
    array_shift($payLoad1);
    $payLoad2 = $payLoad1 + ['image' => $img];

    return $payLoad2;
}
