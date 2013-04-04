<?php 
    session_start();
    if(isset($_SESSION['errormsg']))
    {
        if($_SESSION['errormsg']=='ERROR_NO_USER')
        {
            echo '<span font-color=red>The username does not exist.</span>';
        }
        else if($_SESSION['errormsg']=='ERROR_WRONG_PASSWORD')
        {
            echo '<span font-color=red>The password doesn\'t match.</span>';
        }
        unset($_SESSION['errormsg']);
    }
?>

<form action="loginprocess.php" method="post">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" id="username" name="username" value=""/></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" id="passwd" name="passwd" value=""/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" id="submit" name="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
