<?php

include 'Input/CLI.php';
include 'LoadImg/LoadImage.php';
include 'Operations/width.php';
include 'Operations/ratio.php';
include 'Operations/height.php';
include 'Operations/executeOperations.php';
include 'addWatermark/addWatermark.php';
include 'saveImg/saveImage.php';
include 'Output/outputMessages.php';
include 'IsHelp/isHelp.php';
include 'Validation/validations.php';
include 'Error/error.php';
include 'constants.php';

//$comandLine = 'my_command_line_tool.php --input-file=/home/alexandrumaeran/Desktop/imag.jpg --output-file=/home/alexandrumaeran/Desktop/nasou.jpg --height=1000 --format=3:2 --watermark=/home/alexandrumaeran/Desktop/water.jpg';

$payLoad1 = CLI($argv);
if(isHelp($payLoad1)) {
    showHelp();
    die();
}

$errors = validation($payLoad1);
if(!empty($errors)){
    showError(arrayToString($errors));
    die();
}

$payLoad2 = readImg($payLoad1);
$payLoad3 = executeOperation($payLoad2);
$payLoad4 = watermark($payLoad3);
$payLoad5 = saveImage($payLoad4);

showSuccess($payLoad5);