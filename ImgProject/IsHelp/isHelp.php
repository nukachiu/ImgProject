<?php

/**Checks if help option is set
 * @param array $payLoad
 * @return bool
 */
function isHelp(array $payLoad) : bool
{
    return isset($payLoad[HELP]);
}
