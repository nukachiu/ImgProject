<?php

function watermark($payLoad3)
{
    if(!isset($payLoad3['watermark']))
        return $payLoad3;

    $imageWaterMark = new Imagick($payLoad3['watermark']);
    $imageWaterMark->scaleImage($imageWaterMark->getImageWidth() / 10, 0);

    $imageWidth = $payLoad3['image']->getImageWidth();
    $imageHeight = $payLoad3['image']->getImageHeight();
    $waterMarkWidth = $imageWaterMark->getImageWidth();
    $waterMarkHeight = $imageWaterMark->getImageHeight();

    $coordinates = [
        [0,0],
        [$imageWidth - $waterMarkWidth, 0],
        [0, $imageHeight - $waterMarkWidth],
        [$imageWidth - $waterMarkWidth, $imageHeight - $waterMarkHeight]
    ];

    $waterMarkPosition = $coordinates[array_rand($coordinates)];

    $payLoad3['image']->compositeImage($imageWaterMark,Imagick::COMPOSITE_OVER, $waterMarkPosition[0], $waterMarkPosition[1]);
    unset($payLoad3['watermark']);

    return $payLoad3;
}
