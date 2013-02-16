<?php

require_once 'comparisons.php';
require_once 'compiler.php';
include 'upload.php';
$cppfile = "sq1.cpp";
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
        $fout = fopen($opfile,"r");
        $retval = 1;
        $retval = exact_compare($pipes[1],$fout);
        if($retval == 1)
        {
            echo "Wrong Answer";
        }
        else if($retval == 0)
        {
            echo "Accepted";
        }
        else
        {
            echo "Comparison Error";
        }
    }
    else if($ret[0] == "Time")
    {
        echo "Time Limit Exceeded";
    }
    else if($ret[0] == "Caught")
    {
        echo "Run Time Error";
    }
    else
    {
        echo "Unknown Error";
    }

    fclose($pipes[0]) ;
    if($pipes[1]!= NULL)
        fclose($pipes[1]) ;
    if($fout!= NULL)
    fclose($fout);
    proc_close($p) ;
}
else
{
    echo "The file contains error";
}

?>
