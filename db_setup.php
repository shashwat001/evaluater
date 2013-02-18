<?php
    require_once 'db_config.php';
    $con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
    mysql_selectdb($db_name, $con) or die(mysql_error());

    
    $query = "DROP TABLE IF EXISTS users";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE users (user_id int(10) NOT NULL PRIMARY KEY,      
                                  username varchar(20) NOT NULL UNIQUE,
                                  email varchar(40) NOT NULL UNIQUE,
                                  first_name char(30) NOT NULL,
                                  last_name char(30) NOT NULL,
                                  date_joining date,
                                  last_login timestamp,
                                  roll_no varchar(10) NOT NULL UNIQUE
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    
    
    
    $query = "DROP TABLE IF EXISTS problems";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE problems (problem_code varchar(10) NOT NULL PRIMARY KEY,      
                                  name char(30) NOT NULL,
                                  content text ,
                                  mem_limit int,
                                  time_limit float(5,3),
                                  test_cases int
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    
    
    
    $query = "DROP TABLE IF EXISTS submissions";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE submissions (sub_id int NOT NULL AUTO_INCREMENT,      
                                  username varchar(30) NOT NULL,
                                  problem_code varchar(30) NOT NULL,
                                  status int(1),
                                  content text ,
                                  PRIMARY KEY(sub_id)
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    
    
    echo "Database successfully created";
                                  
?>
