<?php
    require_once 'db_config.php';
    

    
    $query = "DROP TABLE IF EXISTS users";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE users (username varchar(20) PRIMARY KEY,
                                  email varchar(40) NOT NULL UNIQUE,
                                  first_name char(30) NOT NULL,
                                  last_name char(30) NOT NULL,
                                  password varchar(32),
                                  country varchar(30),
                                  address text,
                                  phone int(10),
                                  institute text,
                                  date_joining int,
                                  last_login int
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    
    
    
    /*$query = "DROP TABLE IF EXISTS problems";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE problems (code varchar(20) NOT NULL PRIMARY KEY,     
                                  category int(1)
                                  )";
                                  
    mysql_query($query) or die(mysql_error());



    $query = "DROP TABLE IF EXISTS problems_easy";
    mysql_query($query) or die(mysql_error());

    $query = "CREATE TABLE problems_easy (
                                  code varchar(20) NOT NULL PRIMARY KEY, 
                                  name varchar(30), 
                                  mem_limit int, 
                                  time_limit text, 
                                  submissions int,
                                  correct_submissions int
                                  )";
    
    mysql_query($query) or die(mysql_error());

    $query = "DROP TABLE IF EXISTS problems_medium";
    mysql_query($query) or die(mysql_error());

    $query = "CREATE TABLE problems_medium (
                                  code varchar(20) NOT NULL PRIMARY KEY, 
                                  name varchar(30), 
                                  mem_limit int, 
                                  time_limit text, 
                                  submissions int, 
                                  correct_submissions int
                                  )";
    mysql_query($query) or die(mysql_error());

    $query = "DROP TABLE IF EXISTS problems_hard";
    mysql_query($query) or die(mysql_error());

    $query = "CREATE TABLE problems_hard (
                                  code varchar(20) NOT NULL PRIMARY KEY,
                                  name varchar(30),                                   
                                  mem_limit int, 
                                  time_limit text, 
                                  submissions int, 
                                  correct_submissions int
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
                                  
    mysql_query($query) or die(mysql_error());*/
    
    
    echo "Database successfully created";
                                  
?>
