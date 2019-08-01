<?php

namespace MyApp\Model\ImageProcessor;

class ImageProcessor
{
    private const PROJECT_ROOT='/var/www/my-app/';
    private const UPLOADS_FOLDER_ROOT=self::PROJECT_ROOT . "uploads/";

    public function saveTierWithWateramrk($inputPath, $outputPath, $size)
    {
        if(strcmp($size,'small'))
        {
            $width=100;
        }
        if(strcmp($size,'medium'))
        {
            $width= 200;
        }

        $command = ($size !== 'L') ?
            "php " . __DIR__ . "ImgProject/index.php".
            " --input-file=" . self::UPLOADS_FOLDER_ROOT . $inputPath .
            " --output-file=" . self::UPLOADS_FOLDER_ROOT . $outputPath .
            " --width=" . $width .
            " --watermark=/var/www/my-application/watermark.jpg"
            :"php " . __DIR__ . "ImgProject/index.php" .
            " --input-file=" . self::UPLOADS_FOLDER_ROOT . $inputPath .
            " --output-file=" . self::UPLOADS_FOLDER_ROOT . $outputPath .
            " --watermark=/var/www/my-application/watermark.jpg";
        var_dump($command);

        $this->executeCli($command);
    }

    public function saveTierWithoutWateramrk($inputPath, $outputPath, $size)
    {
        if(strcmp($size,'small'))
        {
            $width=100;
        }
        if(strcmp($size,'medium'))
        {
            $width= 200;
        }

        $command = ($size !== 'L') ?
            "php " . __DIR__ . "ImgProject/index.php".
            " --input-file=" . self::UPLOADS_FOLDER_ROOT . $inputPath .
            " --output-file=" . self::UPLOADS_FOLDER_ROOT . $outputPath .
            " --width=" . $width .
            " --watermark=/var/www/my-application/watermark.jpg"
            :"php " . __DIR__ . "ImgProject/index.php" .
            " --input-file=" . self::UPLOADS_FOLDER_ROOT . $inputPath .
            " --output-file=" . self::UPLOADS_FOLDER_ROOT . $outputPath;
        var_dump($command);

        $this->executeCli($command);
    }

    private function executeCli($command)
    {
        $lastLine = exec($command, $output, $returned);
    }

}