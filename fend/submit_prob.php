<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST['submit']))
    {
        
        $code = $_POST['code'];
        $dirname = "prob/".$code;
        if(mkdir($dirname)==false)
        {
            echo "Can't make directory";
            exit();
        }

        if(move_uploaded_file($_FILES['probfile']["tmp_name"],$dirname."/prob.txt")==false)
        {
            echo "Cant move 1";
            exit();
        }
        
        $tcases = $_POST['hidden'];
        $j = 0;
        for($i = 1;$i <= $tcases;$i++)
        {
            $filename = "tcaseinput".$i;
            if(isset($_FILES[$filename]))
            {
                
                if(move_uploaded_file($_FILES[$filename]["tmp_name"],$dirname."/input" .$j)==false)
                {
                    echo "Cant upload input file ".$i."<br>";
                }
                
                $filename = "tcaseoutput".$i;
                if(move_uploaded_file($_FILES[$filename]["tmp_name"],$dirname."/output" .$j)==false)
                {
                    echo "Cant upload output file ".$i."<br>";
                }
                
                $j++;
            }
            else
            {
                echo "not set ".$i."<br>";
            }
            
        }
        include 'db_config.php';
        $prob_category = array("problems_easy","problems_medium","problems_hard");
        
        $query = "INSERT INTO {$prob_category[$_POST['category']]} VALUES(
                                                                    '{$code}',
                                                                    '{$_POST['name']}',                                                                    
                                                                    {$_POST['memlimit']},
                                                                    {$_POST['tlimit']},
                                                                    0,
                                                                    0
                                                                    )";
        echo $query."<br>";                  
        mysql_query($query,$con) or die(mysql_error());;
        
        $query = "INSERT INTO problems VALUES('{$code}',{$_POST['category']})";
                                                          
        echo $query."<br>"; 
        mysql_query($query,$con) or die(mysql_error());
        mysql_close($con);
    }
?>







<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
  	<script src="js/jquery-1.9.1.js"></script>
  	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/myjquery.js"></script>
	<title>SportCoder</title>
</head>
<body>
<?php include("perma/header.php");?>	

<section id="list"><?php include("centre/submit_prob_pane.php");?></section>
<aside id="side"></aside>
<?php include("perma/footer.php");?>	
	
</body>
</html>