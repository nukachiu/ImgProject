<?php

function stringToIntegerHeight($height)
{
    return intval($height);
}

function canExecuteHeight($payLoad2)
{
    if (!isset($payLoad2['heigth']))
        return false;
    return true;
}

function executeHeight($payLoad2)
{
    if(!canExecuteHeight($payLoad2)){
        return $payLoad2;
    }

    $newHeight = stringToIntegerHeight($payLoad2['height']);

    /**
     * @val \Imagick $payLoad2['image']
     */

    $payLoad2['image']->scaleImage(0,$newHeight);

    return $payLoad2;
}