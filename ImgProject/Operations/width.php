<?php

/**
 * @param $width
 * @return int
 */
function stringtoIntegerWidth($width){
    return intval($width);
}

/**
 * @param $payLoad2
 * @return bool
 */
function canExecuteWidth($payLoad2){
    if(!isset($payLoad2[WIDTH]))
        return false;
    return true;
}

/**
 * @param $payLoad2
 * @return mixed
 */
function executeWidth($payLoad2){
    if(!canExecuteWidth($payLoad2)){
        return $payLoad2;
    }

    $newWidth = stringtoIntegerWidth($payLoad2[WIDTH]);

    $payLoad2[IMAGE]->scaleImage($newWidth,0);

    return $payLoad2;
}

