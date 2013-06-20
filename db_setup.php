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
                                  phone varchar(15),
                                  institute text,
                                  date_joining int,
                                  last_login int,
                                  submissions int DEFAULT 0,
                                  AC int DEFAULT 0,
                                  WA int DEFAULT 0,
                                  TLE int DEFAULT 0,
                                  CE int DEFAULT 0,
                                  RE int DEFAULT 0,
                                  score int DEFAULT 0,
                                  PS int DEFAULT 0
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    
    
    
    $query = "DROP TABLE IF EXISTS problems";
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
                                  correct_submissions int,
                                  test_count int DEFAULT 0
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
                                  correct_submissions int,
                                  test_count int DEFAULT 0
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
                                  correct_submissions int,
                                  test_count int DEFAULT 0
                                  )";
    
    mysql_query($query) or die(mysql_error());
    
    
    
    $query = "DROP TABLE IF EXISTS submissions";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE submissions (sub_id int NOT NULL,      
                                  username varchar(30) NOT NULL,
                                  problem_code varchar(30) NOT NULL,
                                  language varchar(5) NOT NULL,
                                  filename varchar(30) NOT NULL,
                                  status varchar(10),
                                  time decimal(5,3),
                                  PRIMARY KEY(sub_id)
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    
    $query = "DROP TABLE IF EXISTS pending";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE pending (sub_id int NOT NULL,      
                                  username varchar(30) NOT NULL,
                                  problem_code varchar(30) NOT NULL,
                                  language varchar(5) NOT NULL,
                                  filename varchar(30) NOT NULL,
                                  PRIMARY KEY(sub_id)
                                  )";
                                  
    mysql_query($query) or die(mysql_error());
    

    
    
    $query = "DROP TABLE IF EXISTS comments";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE comments (comment_id int NOT NULL,      
                                  username varchar(30) NOT NULL,
                                  code varchar(30) NOT NULL,
                                  text text NOT NULL,
                                  time int,
                                  PRIMARY KEY(comment_id)
                                  )";
    
    mysql_query($query) or die(mysql_error());
    
    $query = "DROP TABLE IF EXISTS contests";
    mysql_query($query) or die(mysql_error());
    
    $query = "CREATE TABLE contests (code varchar(20) NOT NULL,      
                                  name varchar(30) NOT NULL,
                                  stime int,
                                  etime int,
                                  PRIMARY KEY(code)
                                  )";
    
    mysql_query($query) or die(mysql_error());
    
    echo "Database successfully created";
    
                                  
?>
