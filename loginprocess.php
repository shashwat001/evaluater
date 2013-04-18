<?php
    
    session_start();
    
    if(isset($_SESSION['username']))
    {
        header('Location:index.php');
    }
    else
    {        
        $username = $_POST['username'];
        $password = $_POST['passwd'];
        include 'db_config.php';
        $query = "SELECT username, password from users where username='{$username}'";
        $result = mysql_query($query) or die(mysql_error());
        $count = mysql_num_rows($result);
        if($count == 0)
        {
            mysql_close($con);
            $_SESSION['errormsg'] = "ERROR_NO_USER";
            header('Location:login.php');
        }
        else
        {            
            $record = mysql_fetch_array($result);
            if($password == $record['password'])
            {
                $_SESSION['username'] = $username;
                header('Location:index.php');
            }
            else 
            {
                $_SESSION['errormsg'] = "ERROR_WRONG_PASSWORD";
                header('Location:login.php');
            }
            mysql_close($con);
        }
        
    }
?>
