<?php

/**
 * @param $ratio
 * @return array
 */
function stringToIntegerRatio(string $ratio) : array
{
    sscanf($ratio,"%d:%d", $ratioX, $ratioY);

    return [$ratioX,  $ratioY];
}

/**
 * @param $payLoad2
 * @return bool
 */
function canExecuteRatio(array $payLoad2) : bool
{
    if(!isset($payLoad2[FORMAT]))
        return false;
    return true;
}

/**
 *If both of width and height are set or none of them then initial width has priority
 * @param array $payLoad2
 * @return array
 */
function executeRatio(array $payLoad2) : array
{
    if(!canExecuteRatio($payLoad2)){
        return $payLoad2;
    }

    list($ratioX, $ratioY) = stringToIntegerRatio($payLoad2[FORMAT]);

    if(isset($payLoad2[HEIGHT]) && !isset($payLoad2[WIDTH])){
        $height = $payLoad2[HEIGHT];
        $width = ($ratioX * $height) / $ratioY;

        $payLoad2[IMAGE]->scaleImage($width,$height);

        unset($payLoad2[FORMAT]);
        return $payLoad2;
    }

    if(isset($payLoad2[WIDTH]) && !isset($payLoad2[HEIGHT])){
        $width = $payLoad2[WIDTH];
        $height = ($ratioY * $width) / $ratioX;

        $payLoad2[IMAGE]->scaleImage($width,$height);

        unset($payLoad2[FORMAT]);
        return $payLoad2;
    }

    $oldWidth = $payLoad2[IMAGE]->getImageWidth();

    $newHeight = ($ratioY * $oldWidth) / $ratioX;

    $payLoad2[IMAGE]->scaleImage($oldWidth,$newHeight);

    unset($payLoad2[FORMAT]);
    return $payLoad2;
}