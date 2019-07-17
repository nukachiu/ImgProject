<?php

/**
 * @param $comandLine
 * @return array
 */
function CLI($comandLine){


//    $payLoad = [
//        "input-file" => '',
//        "output-file" => '',
//        "width" => '',
//        "height" => '',
//        "format" => '',
//        "watermark" => '',
//        "help" => '',
//    ];

    $payLoad = array();

    $payAux = explode(" ", $comandLine);
    $pattern = '/--(?<key>[a-z | -]+)=?(?<value>\S*\w+)*/';
    array_shift($payAux);

    $matches = '';
    foreach ($payAux as $item){
        preg_match($pattern, $item, $matches);

        if(strcmp($matches['key'], "help") == 0) // help command is a special case because it hasn't value field
            $payLoad[$matches['key']] = true;
        else
            $payLoad[$matches['key']] = $matches['value'];
    }

    return $payLoad;
}

//$comandLine = "my_command_line_tool.php --input-file=/home/username/images/img.jpg --output-file=/home/username/resized_images/img.jpg --width=30 --height=40";



