<?php
ob_start();

function compile($file)
{
    $cmd = "g++  ".$file;
    exec($cmd, $output, $retval);
    return $retval;
}

function compare($f1,$f2)
{
    $ret1 = fscanf($f1,"%s",$ch1); 
    $ret2 = fscanf($f2,"%s",$ch2);
    if($ret1 != $ret2)
    {
            fclose($f1);
            fclose($f2);
            return 1;
    }
    $i = 0;
    while($ch1==$ch2)
    {
            $ret1 = fscanf($f1,"%s",$ch1); 
            $ret2 = fscanf($f2,"%s",$ch2);
            if($ret1 != $ret2)
            {
                    fclose($f1);
                    fclose($f2);
                    return 1;
            }
            if($ret1 == NULL)
            {
                    fclose($f1);
                    fclose($f2);
                    return 0;
            }			

    }

    fclose($f1);
    fclose($f2);
    return 1;

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
        $fout = fopen($opfile,"r");
        $retval = 1;
        $retval = compare($pipes[1],$fout);
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
