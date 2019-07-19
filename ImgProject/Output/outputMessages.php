<?php

function showSuccess($payLoad5)
{
    printf("Saved in %s%s",$payLoad5['output-file'], PHP_EOL);
}

function showHelp()
{
    printf("S-a apelat functia de help%s", PHP_EOL);
}

function showError($errorArray)
{
    printf('%s%s',$errorArray,PHP_EOL);
}