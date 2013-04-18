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
    <table align="center" style="width: 70%;margin-top: 50px;">
        <tr>
            <td colspan="2" align="center" class="headertextprop">
                Enter details
            </td>
        </tr>
        <tr>
            <td class="textprop" style="width: 300px;">Username:</td>
            <td><input type="text" id="username" name="username" value="" style="width: 300px;"/></td>
        </tr>
        <tr>
            <td class="textprop" style="width: 300px;">Password:</td>
            <td><input type="password" id="passwd" name="passwd" value="" style="width: 300px;"/></td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" id="submit" name="submit" value="Submit" class="bttn"/></td>
        </tr>
    </table>
</form>
