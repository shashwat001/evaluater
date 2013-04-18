<?php

function compile($file,$lang)
{
    $cmd = "";
    if($lang == "cpp")
        $cmd = "g++  ".$file;
    else if($lang == "c")
        $cmd = "gcc  ".$file;
    echo $cmd."<br>";
    exec($cmd, $output, $retval);
    return $retval;
}


?>
