<?php

function stringtoIntegerWidth($width){
    return intval($width);
}

function canExecuteWidth($payLoad2){
    if(!isset($payLoad2['width']))
        return false;
    return true;
}

function executeWidth($payLoad2){
    if(!canExecuteWidth($payLoad2)){
        return $payLoad2;
    }

    $newWidth = stringtoIntegerWidth($payLoad2['width']);

    /**
     * @val \Imagick $payLoad['image']
     */

    $payLoad2['image']->scaleImage($newWidth,0);

    return $payLoad2;
}

