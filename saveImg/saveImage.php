<?php

function saveImage($payLoad4)
{
    $outputURL = $payLoad4['output-file'];
    //unset($payLoad4['output-file']);

    $payLoad4['image']->writeImage($outputURL);

    return $payLoad4;
}
