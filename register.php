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




<section id="list">

<?php
    require 'db_config.php';
    $username=$_POST["username"];
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $emailid=$_POST["emailid"];
    $password=$_POST["password"];
    $country=$_POST["country"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $institute=$_POST["institute"];
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $lastlogin = null;
    $query = "INSERT INTO users VALUES ('{$username}', '{$emailid}', '{$firstname}', '{$lastname}','{$password}', '{$country}', '{$address}','{$phone}', '{$institute}',{$timestamp},'{$lastlogin}',0,0,0,0,0,0,0,0)";
    $result = mysql_query($query);
    switch (mysql_errno())
    {
        case 0:
            echo "You have successfully registered";
            break;
        
        case 1062:
            session_start();
            $keys = end(explode(" ", mysql_error()));
            if($keys == "'PRIMARY'")
            {
                $_SESSION['errorreg'] = "username";
            }
            else 
            {
                $_SESSION['errorreg'] = "email";
            }
            header("Location:signup.php");
            break;
    }

    mysql_close($con);
    
    
?>
</section>
    
    
<aside id="side"><?php include("sidebar/mainindex.php");?></aside>
<?php include("perma/footer.php");?>	
	
</body>
</html>