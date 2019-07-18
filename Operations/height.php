<?php

/**
 * @param $height
 * @return int
 */
function stringToIntegerHeight($height)
{
    return intval($height);
}

/**
 * @param $payLoad2
 * @return bool
 */
function canExecuteHeight($payLoad2)
{
    if (!isset($payLoad2[HEIGHT]))
        return false;
    return true;
}

/**
 * @param $payLoad2
 * @return mixed
 */
function executeHeight($payLoad2)
{
    if(!canExecuteHeight($payLoad2)){
        return $payLoad2;
    }

    $newHeight = stringToIntegerHeight($payLoad2[HEIGHT]);

    $payLoad2[IMAGE]->scaleImage(0,$newHeight);

    return $payLoad2;
}