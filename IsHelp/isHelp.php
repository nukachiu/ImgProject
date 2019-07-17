<?php

function isHelp($payLoad1)
{
    if(isset($payLoad1['help']))
        return true;
    return false;
}
