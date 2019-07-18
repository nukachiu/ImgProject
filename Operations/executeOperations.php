<?php

/**
 * @param $payLoad2
 * @return array|mixed
 */
function executeOperation($payLoad2){

    if(isset($payLoad2[FORMAT]))
        return executeRatio($payLoad2);

    if(isset($payLoad2[WIDTH]))
        return executeWidth($payLoad2);

    if(isset($payLoad2[HEIGHT]))
        return executeHeight($payLoad2);
}