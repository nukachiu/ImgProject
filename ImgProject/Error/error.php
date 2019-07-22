<?php

/**
 * @param array $errorArray
 * @return string
 */
function arrayToString(array $errorArray) : string
{
    return implode(PHP_EOL,$errorArray);
}