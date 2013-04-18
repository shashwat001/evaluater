<?php
session_start();
?>

<header>
    <div id = "headerDiv" >
        <a href="index.php" style="padding-left:100px;float:left;padding-top:10px;text-shadow: 2px 2px #ff0000;font:italic normal 70px Georgia,serif;" >Code Battle</a>
        <div style="float:right;padding-right:100px;padding-top:30px">
            
            <?php
                
    
                if(isset($_SESSION['username']))
                {
                    echo "<span style=\" padding: 10px;font: large sans-serif;\">Welcome </span><a style=\" padding: 10px;font: large sans-serif;\" href=\"profile.php?username={$_SESSION['username']}\">{$_SESSION['username']}</a>&nbsp;&nbsp;&nbsp;<a href=\"contestform.php\" style=\" padding: 10px;font: large sans-serif;\">Create a Contest</a>&nbsp;&nbsp;&nbsp;<a style=\" padding: 10px;font: large sans-serif;\" href=\"mysubmission.php\">My Submissions</a>&nbsp;&nbsp;&nbsp;<a style=\" padding: 10px;font: large sans-serif;\" href=\"logout.php\">Logout</a>";
                }
            
           else{
              echo  "<a style=\" margin-bottom:20px;padding: 20px;font: large sans-serif;\" href=\"login.php\">Login</a>
                
                <a style=\" padding: 10px;font: large sans-serif;\" href=\"signup.php\">Register</a>";
           }
             ?>
            
        </div>


    </div>
</header>