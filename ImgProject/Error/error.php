<?php

function arrayToString($errorArray)
{
    $payload10 = implode(PHP_EOL,$errorArray);

    return $payload10;
}