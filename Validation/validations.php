<?php

/**
 * @param $payLoad1
 * @return bool
 */
function validationInputPath($payLoad1)
{
    //if input-file is written wrong $payLoad1['intput-file'] is unset so file_exists throw an exception
    if(!isset($payLoad1[INPUT_FILE]))
        return false;

    if(file_exists($payLoad1[INPUT_FILE]))
        return true;
    return false;
}

function validationOutputPath($payLoad1)
{
    if(!isset($payLoad1[OUTPUT_FILE]))
        return false;

    $length = strrpos($payLoad1[OUTPUT_FILE],'/');

    $outputPath = substr($payLoad1[OUTPUT_FILE],0,$length);

    if(file_exists($outputPath))
        return true;
    return false;
}

/**Checks if width and height are numbers
 * @param $payLoad1
 * @return bool
 */
function validationPixels(array $payLoad1) : bool
{
    if(!isset($payLoad1[WIDTH]) && !isset($payLoad1[HEIGHT]))
        return false;

    $pattern = '/^[0-9]*$/';

    if(isset($payLoad1[WIDTH]) || !isset($payLoad1[HEIGHT])) {
        $width = $payLoad1[WIDTH];
        if(preg_match($pattern,$width) === 0)
            return false;
        return true;
    }

    if(isset($payLoad1[HEIGHT]) || !isset($payLoad1[WIDTH])){
        $height = $payLoad1[HEIGHT];
        if(preg_match($pattern, $height) === 0)
            return false;
        return true;
    }

    $width = $payLoad1[WIDTH];
    $height = $payLoad1[HEIGHT];

    if(preg_match($pattern, $width) === 0 || preg_match($pattern, $height) === 0)
        return false;
    return true;
}

/**
 * @param $payLoad1
 * @return bool
 */
function validationFormat($payLoad1)
{
    $pattern = '/(^[0-9]*):([0-9]+$)/';

    if(preg_match($pattern, $payLoad1[FORMAT]) === 0)
        return false;
    return true;
}


/**
 * @param $payLoad1
 * @return bool
 */
function validationExtension($payLoad1)
{
    //if input-file is written wrong $payLoad1['intput-file'] is unset so file_exists throw an exception
    if(!isset($payLoad1[INPUT_FILE]))
        return false;

    if(!file_exists($payLoad1[INPUT_FILE]))
        return false;

   $mimeType = mime_content_type($payLoad1[INPUT_FILE]);

   if($mimeType === false)
       return false;

   $arrayExtension = [
       'jpg',
       'jpeg',
       'png'
   ];

   $extension = explode("/", $mimeType);

   if(in_array($extension[1], $arrayExtension) && strcmp($extension[0], IMAGE) == 0)
       return true;
   return false;

}

/**
 * @param $payLoad1
 * @return bool
 */
function validationCommand($payLoad1){

    $allCommands = [
        INPUT_FILE,
        OUTPUT_FILE,
        WIDTH,
        HEIGHT,
        FORMAT,
        'help',
        WATERMARK
    ];

    foreach ($payLoad1 as $key => $value)
    {
        if(in_array($key, $allCommands) === false) {
            return false;
        }
    }

    return true;
}

/**
 * Retunrs an array of errors
 * @param $payLoad1
 * @return array
 */
function validation($payLoad1)
{
    $errors = array();

    if(!validationInputPath($payLoad1))
        $errors['errorInputPath'] = 'Invalid Input Path!';
    if(!validationOutputPath($payLoad1))
        $errors['errorOutputPath'] = 'Invalid Output Path!';
    if(!validationPixels($payLoad1))
        $errors['errorPixels'] = 'Invalid arguments for width and height';
    if(!validationExtension($payLoad1))
        $errors['errorExtension'] = 'Invalid type of file';
    if(!validationCommand($payLoad1))
        $errors['errorCommand'] = 'Invalid command';
    if(!validationFormat($payLoad1))
        $errors['errorFormat'] = 'Invalid format';
    if(!validationWATERMARK($payLoad1))
        $errors['errorWATERMARK'] = 'Invalid WATERMARK';

    return $errors;
}

/**
 * @param $payLoad1
 * @return bool
 */
function validationWATERMARK($payLoad1)
{
    if(!isset($payLoad1[WATERMARK]))
        return true;

    if(!file_exists($payLoad1[WATERMARK]))
        return false;

    return true;
}