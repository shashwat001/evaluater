<?php

$db_host = "localhost";
$db_user = "localjudge";
$db_name = "localjudge";
$db_pass = "judgepass";
$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_selectdb($db_name, $con) or die(mysql_error());
?>
