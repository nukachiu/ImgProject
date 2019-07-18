<?php

function isHelp($payLoad1)
{
    if(isset($payLoad1[HELP]))
        return true;
    return false;
}
