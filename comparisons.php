<?php
function exact_compare($f1,$f2)
{
    $ret1 = fscanf($f1,"%s",$ch1); 
    $ret2 = fscanf($f2,"%s",$ch2);
    if($ch1 != $ch2)
    {
            return 1;
    }
    while($ch1==$ch2)
    {
            $ret1 = fscanf($f1,"%s",$ch1); 
            $ret2 = fscanf($f2,"%s",$ch2);
            if($ch1 != $ch2)
            {
                    return 1;
            }
            if($ret1 == NULL)
            {
                    return 0;
            }			

    }
    return 1;

}

?>
