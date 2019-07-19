<?php

function saveImage($payLoad4)
{
    $outputURL = $payLoad4[OUTPUT_FILE];

    $payLoad4[IMAGE]->writeImage($outputURL);

    return $payLoad4;
}
