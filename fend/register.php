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
    echo $timestamp."<br>";
    $lastlogin = null;
    $query = "INSERT INTO users VALUES ('{$username}', '{$emailid}', '{$firstname}', '{$lastname}','{$password}', '{$country}', '{$address}','{$phone}', '{$institute}',{$timestamp},'{$lastlogin}')";
    $result = mysql_query($query) or die(mysql_error());
    echo $query."<br>";
    echo "register successful";
    mysql_close($con);
?>