<?php

function compile($file)
{
    $cmd = "g++  ".$file;
    exec($cmd, $output, $retval);
    return $retval;
}


?>
