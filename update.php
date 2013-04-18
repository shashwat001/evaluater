<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
  	<script src="js/jquery-1.9.1.js"></script>
  	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/myjquery.js"></script>
        
</head>
<body>
<?php include("perma/header.php");?>	

<?php
    require 'db_config.php';
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $emailid=$_POST["emailid"];
    $password=$_POST["password"];
    $country=$_POST["country"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $institute=$_POST["institute"];
    if(!isset($_SESSION['username']))
    {
        echo "<div style=\"min-height:550px;\">You have to login first</div>";
    }
    else 
    {    
        $query = "UPDATE users SET first_name='{$firstname}', last_name='{$lastname}', email='{$emailid}', password='{$password}', country='{$country}', address='{$address}', phone='{$phone}', institute='{$institute}' WHERE username='{$_SESSION['username']}'";
        $result = mysql_query($query) or die(mysql_error());
        echo "<div style=\"min-height:550px\">Profile Updated Successfully...</div>";
        mysql_close($con);
    }
?>
<?php include("perma/footer.php");?>	
	
</body>
</html>