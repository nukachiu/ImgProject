<?php

function watermark($payLoad3)
{
    if(!isset($payLoad3[WATERMARK]))
        return $payLoad3;

    $imageWaterMark = new Imagick($payLoad3[WATERMARK]);
    $imageWaterMark->scaleImage($imageWaterMark->getImageWidth() / 10, 0);

    $imageWidth = $payLoad3[IMAGE]->getImageWidth();
    $imageHeight = $payLoad3[IMAGE]->getImageHeight();
    $waterMarkWidth = $imageWaterMark->getImageWidth();
    $waterMarkHeight = $imageWaterMark->getImageHeight();

    $coordinates = [
        [0,0],
        [$imageWidth - $waterMarkWidth, 0],
        [0, $imageHeight - $waterMarkHeight],
        [$imageWidth - $waterMarkWidth, $imageHeight - $waterMarkHeight]
    ];

    $waterMarkPosition = $coordinates[array_rand($coordinates)];

    $payLoad3[IMAGE]->compositeImage($imageWaterMark,Imagick::COMPOSITE_OVER, $waterMarkPosition[0], $waterMarkPosition[1]);
    unset($payLoad3[WATERMARK]);

    return $payLoad3;
}
