<?php
function exact_compare($f1,$f2)
{
    $ret1 = fscanf($f1,"%s",$ch1); 
    $ret2 = fscanf($f2,"%s",$ch2);
    if($ret1 != $ret2)
    {
            fclose($f1);
            fclose($f2);
            return 1;
    }
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
