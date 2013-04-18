<?php

require_once 'comparisons.php';
require_once 'compiler.php';
require_once 'post_submission.php';
require_once 'db_config.php';

$prob_category = array("problems_easy","problems_medium","problems_hard");


$query = "SELECT * FROM pending ORDER BY sub_id limit 1";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if($count == 0)
{

    exit();
}
$record = mysql_fetch_array($result);

$query = "SELECT category FROM problems WHERE code='{$record['problem_code']}'";
$catresult = mysql_query($query) or die(mysql_error());
$catrecord = mysql_fetch_array($catresult) or die(mysql_error());


$query = "SELECT submissions, correct_submissions, time_limit, mem_limit, test_count FROM {$prob_category[$catrecord['category']]} WHERE code='{$record['problem_code']}'";
$result = mysql_query($query) or die(mysql_error());
$probrecord = mysql_fetch_array($result);








$codefile = "submissions/{$record['filename']}";




$status = compile($codefile,$record['language']);
if($status == 0)
{
    $flag = 0;
    $desc = array(
         0 => array("pipe","r"),
         1 => array("pipe","w"),
         2 => array("pipe","w")
        );
    for($i = 0;$i < $probrecord['test_count'];$i++)
    {
        $ipfile = "prob/{$record['problem_code']}/input{$i}";
        $opfile = "prob/{$record['problem_code']}/output{$i}";
        $cmd = "./sandbox.out -a2 -f -m 32000 -t 1 -i ".$ipfile." a.out";

        $p = proc_open($cmd,$desc,$pipes);
        $ret =  explode(" ",stream_get_contents($pipes[2]));
        if($ret[0] == "OK")
        {
            $fout = fopen($opfile,"r");
            $retval = 1;
            $retval = exact_compare($pipes[1],$fout);
            if($retval == 1)
            {
                $flag = 1;
                echo "Wrong Answer";
                post_submission($record, "WA");
                break;
            }
            else if($retval == 0)
            {
                echo "Accepted";
                //post_submission($record, "AC");
            }
            else
            {
                echo "Comparison Error";
            }
            if($fout!= NULL)
                fclose($fout);
        }
        else if($ret[0] == "Time")
        {
            $flag = 1;
            echo "Time Limit Exceeded";
            post_submission($record, "TLE");
            break;
        }
        else if($ret[0] == "Caught")
        {
            $flag = 1;
            echo "Run Time Error";
            post_submission($record, "RE");
            break;
        }
        else
        {
            $flag = 1;
            echo "Unknown Error";
            post_submission($record, "RE");
            break;
        }

        fclose($pipes[0]) ;
        if($pipes[1]!= NULL)
            fclose($pipes[1]) ;
        proc_close($p) ;
    }
    if($flag== 0)
    {
        echo "Finally Accepted";
        post_submission($record, "AC", $ret[4]);
    }
}
else
{
    echo "The file contains error";
    post_submission($record, "CE");
}


?>
