<?php

namespace MyApp\Model\Download;

class DownloadPhoto
{

    private $fileName;
    /**
     * DownloadPhoto constructor.
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function downloadPhoto($fileName){
        if (file_exists($fileName)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        flush();
        readfile($fileName);
    }

    }
}