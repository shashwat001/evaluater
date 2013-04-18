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
    
    
<?php
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $code = $_POST['code'];
        $lang = $_POST['lang'];
        require 'db_config.php';
        $query = "SELECT count(*) as count from submissions";
        $result = mysql_query($query) or die(mysql_error());
        $record = mysql_fetch_array($result)  or die(mysql_error());
        $count = $record['count'];

        $sub_id = $count + 1;
        $extension = end(explode(".", $_FILES["solfile"]["name"]));
        $filename = $sub_id.".".$extension;
        if(move_uploaded_file($_FILES['solfile']["tmp_name"],"submissions/{$filename}")==false)
        {
            echo "Cant move 1";
            exit();
        }

        $query = "INSERT INTO pending values ({$sub_id},'{$username}','{$code}','{$lang}','{$filename}')";
        mysql_query($query) or die(mysql_error());;

        $query = "INSERT INTO submissions values ({$sub_id},'{$username}','{$code}','{$lang}','{$filename}','Evaluating',0.00)";
        mysql_query($query) or die(mysql_error());

        mysql_close($con);

    
        
    }
    else
    {
        header('Location:login.php');
        exit();
    }

    
?>



<section id="list"><?php echo "Solution has been submitted<br>You can view your submissions in <a href=\"mysubmission.php\">My submissions</a>"; ?></section>
<aside id="side"><?php include("sidebar/mainindex.php");?></aside>
<?php include("perma/footer.php");?>	
	
</body>
</html>