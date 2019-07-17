<?php

include 'height.php';
include 'width.php';

function canExecute($payLoad2)
{
    if(!(canExecuteHeight($payLoad2) || canExecuteWidth($payLoad2)))
        return false;
    return true;
}

function executeHeightAndWidth($payLoad2)
{
    if(!canExecute($payLoad2))
        return $payLoad2;

    $newWidth = stringtoIntegerWidth($payLoad2['width']);
    $newHeight = stringtoIntegerWidth($payLoad2['height']);

    /**
     * @val \Imagick $payLoad2['image']
     */

    $payLoad2['image']->scaleImage($newWidth,$newHeight);
}



