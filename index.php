<?php

include 'Input/CLI.php';
include 'LoadImg/LoadImage.php';
include 'Operations/width.php';
include 'Operations/ratio.php';
include 'addWatermark/addWatermark.php';
include 'saveImg/saveImage.php';
include 'Output/outputMessages.php';
include 'IsHelp/isHelp.php';

$comandLine = 'my_command_line_tool.php --input-file=/home/alexandrumaeran/Desktop/imag.jpg --output-file=/home/alexandrumaeran/Desktop/nsou.jpg --width=80 --height=30 --format=1:1';

$payLoad1 = CLI($comandLine);
if(!isHelp($payLoad1)) {
    $payLoad2 = readImg($payLoad1);
    $payLoad3 = executeRatio($payLoad2);
    $payLoad4 = watermark($payLoad3);
    $payLoad5 = saveImage($payLoad4);

    showSuccess($payLoad5);
    die();
}
showHelp();