<?php

function compile($file)
{
    $cmd = "g++  ".$file;
    exec($cmd, $output, $retval);
    return $retval;
}

?>





<?php
$cppfile = "sq.cpp";
$ipfile = "input";
$opfile = "output";

$status = compile($cppfile);
if($status == 0)
{
    $cmd = "./sandbox.out -a2 -f -m 32000 -t 1 -i ".$ipfile." a.out";
 $desc = array(
     0 => array("pipe","r"),
     1 => array("pipe","w"),
     2 => array("pipe","w")
 );
    $p = proc_open($cmd,$desc,$pipes);
    $ret =  explode(" ",stream_get_contents($pipes[2]));
    if($ret[0] == "OK")
    {
     echo $ret[0];
    }
    else
        echo "Sorry";
 
    fclose($pipes[0]) ;
 fclose($pipes[1]) ;
  proc_close($p) ;
}
else
{
    echo "The file contains error";
}

?>
