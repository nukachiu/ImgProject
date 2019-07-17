<?php

function stringToIntegerRatio($ratio)
{
    $width = 0;
    $height = 0;

    sscanf($ratio,"%d:%d", $ratioX, $ratioY);

    return [$ratioX,  $ratioY];
}

function canExecuteRatio($payLoad2)
{
    if(!isset($payLoad2['format']))
        return false;
    return true;
}

function executeRatio($payLoad2)
{
    if(!canExecuteRatio($payLoad2)){
        return $payLoad2;
    }

    list($ratioX, $ratioY) = stringToIntegerRatio($payLoad2['format']);

    $oldWidth = $payLoad2['image']->getImageWidth();

    $newHeight = ($ratioY * $oldWidth) / $ratioX;

    //printf("%f = (%d * %d) / %d", $newHeight, $ratioY, $oldWidth, $ratioX);

    //var_dump($oldWidth, $newHeight);

    $payLoad2['image']->scaleImage($oldWidth,$newHeight);

    unset($payLoad2['format']);
    return $payLoad2;
}