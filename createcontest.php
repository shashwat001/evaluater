<?php
if(isset($_POST['submit']))
{
    echo "Contest Created";
    $contestcode = $_POST['code'];
    mkdir("contest/".$contestcode, 0777);

    $dir = "contest/".$contestcode;

    copy('contest_template.php', "{$dir}/index.php");
    copy('db_config.php', "{$dir}/db_config.php");


    $str = file_get_contents("contest_problem.php");
    $f = fopen("{$dir}/problems.php", "w");
    fprintf($f, $str,"{$contestcode}_problems",$_POST['contestname']);

    fclose($f);


    require_once 'db_config.php';
    
    $times = new DateTime($_POST["sdate"]." ".$_POST["stime"]);
    $timee = new DateTime($_POST["edate"]." ".$_POST["etime"]);
    $timestart = $times->getTimestamp();
    $timeend = $times->getTimestamp();
    


    $query = "INSERT INTO contests values( '{$contestcode}','{$_POST['contestname']}',{$timestart},{$timeend})";
    mysql_query($query) or die(mysql_error());
    $query = "CREATE TABLE {$contestcode}_submissions (sub_id int NOT NULL,      
                                      username varchar(30) NOT NULL,
                                      problem_code varchar(30) NOT NULL,
                                      language varchar(5) NOT NULL,
                                      filename varchar(30) NOT NULL,
                                      status varchar(10),
                                      time decimal(5,3),
                                      PRIMARY KEY(sub_id)
                                      )";

    mysql_query($query) or die(mysql_error());

    $query = "CREATE TABLE {$contestcode}_pending (sub_id int NOT NULL,      
                                      username varchar(30) NOT NULL,
                                      problem_code varchar(30) NOT NULL,
                                      language varchar(5) NOT NULL,
                                      filename varchar(30) NOT NULL,
                                      PRIMARY KEY(sub_id)
                                      )";

    mysql_query($query) or die(mysql_error());

    $query = "CREATE TABLE {$contestcode}_problems (
                                      code varchar(20) NOT NULL PRIMARY KEY,
                                      name varchar(30),                                   
                                      mem_limit int, 
                                      time_limit text, 
                                      submissions int, 
                                      correct_submissions int,
                                      test_count int
                                      )";

    mysql_query($query) or die(mysql_error());



    $probcount = $_POST['probcount'];

    for($j = 0;$j < $probcount;$j++)
    {
        $code = $_POST["code{$j}"];
        $dirname = "prob/".$code;
        if(mkdir($dirname)==false)
        {
            echo "Can't make directory";
            exit();
        }

        if(move_uploaded_file($_FILES["probfile{$j}"]["tmp_name"],$dirname."/prob.txt")==false)
        {
            echo "Cant move 1";
            exit();
        }
        
        $tcases = $_POST["tcases{$j}"];
        $k = 0;
        for($i = 1;$i <= $tcases;$i++)
        {
            $filename = "tcaseinput".$j."_".$i;
            if(isset($_FILES[$filename]))
            {
                
                if(move_uploaded_file($_FILES[$filename]["tmp_name"],$dirname."/input" .$k)==false)
                {
                    echo "Cant upload input file ".$i."<br>";
                }
                
                $filename = "tcaseoutput".$j."_".$i;
                if(move_uploaded_file($_FILES[$filename]["tmp_name"],$dirname."/output" .$k)==false)
                {
                    echo "Cant upload output file ".$i."<br>";
                }
                
                $k++;
            }
            else
            {
                echo "not set ".$i."<br>";
            }
            
        }

        
        $query = "INSERT INTO {$contestcode}_problems VALUES(
                                                                    '{$code}',
                                                                    '{$_POST["name{$j}"]}',                                                                    
                                                                    {$_POST["memlimit{$j}"]},
                                                                    {$_POST["tlimit{$j}"]},
                                                                    0,
                                                                    0,
                                                                    {$k}
                                                                    )";                 
        mysql_query($query,$con) or die(mysql_error());
    }
    mysql_close();
}

?>
