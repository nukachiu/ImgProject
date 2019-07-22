<?php

/**Returns an array associative with command options
 * @param string $comandLine
 * @return array
 */
function CLI(string $comandLine) : array
{
    $payLoad = array();

    $payAux = explode(" ", $comandLine);
    $pattern = '/--(?<key>[a-z | -]+)=?(?<value>\S*\w+)*/';
    array_shift($payAux);

    $matches = '';
    foreach ($payAux as $item){
        preg_match($pattern, $item, $matches);

        if(strcmp($matches['key'], HELP) == 0) // help command is a special case because it hasn't value field
            $payLoad[$matches['key']] = true;
        else
            $payLoad[$matches['key']] = $matches['value'];
    }

    return $payLoad;
}

