<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Register</title>
        <script type="text/javascript">
            function Store()
            {
                return true;
            }
        </script>
</head>
<body>
<?php include("perma/headersignup.php");?>	
 
    <div id="registerDiv" style="min-height: 550px;">
        <form action="register.php" method="post" onsubmit="return Store()">
        <table id="regTable" border="1">
            <tr style="padding-bottom: 50px">
                <td colspan = "2" align="center">
                    <span style="font: normal 30px sans-serif ">Enter Details to register</span>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>User Name: </span>
                </td>
                <td align="left">
                    <input type="text" id="userName" name="username" class="inputText" style="width:300px"/>
                    <span style="color: red;"><?php 
                            session_start();
                            if(isset($_SESSION['errorreg']))
                            {
                                if($_SESSION['errorreg']=="username")
                                {
                                    echo "username already exists";
                                    unset($_SESSION['errorreg']);
                                }                                                        
                            }
                            ?></span>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>First Name: </span>
                </td>
                <td align="left">
                    <input type="text" id="firstName" name="firstname" class="inputText" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Last Name: </span>
                </td>
                <td align="left">
                    <input type="text" id="lastName" name="lastname" class="inputText" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Email Id: </span>
                </td>
                <td align="left">
                    <input type="text" id="emailId" name="emailid" class="inputText" style="width:300px"/>
                    <span style="color: red;"><?php 
                            if(isset($_SESSION['errorreg']))
                            {
                                if($_SESSION['errorreg']=="email")
                                {
                                    echo "email alredy exists";
                                    unset($_SESSION['errorreg']);
                                }

                            }
                            ?></span>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Password: </span>
                </td>
                <td align="left">
                    <input type="password" id="password" name="password" class="inputText" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Country: </span>
                </td>
                <td align="left">
                    <input type="text" id="country" name="country" class="inputText" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Address: </span>
                </td>
                <td align="left">
                    <input type="text" id="address" name="address" class="inputText" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Phone: </span>
                </td>
                <td align="left">
                    <input type="text" id="phone" name="phone" class="inputText" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <span>Institute: </span>
                </td>
                <td align="left">
                    <select name="institute" id="institute" class="inputText" style="width: 400px" >
                        <?php
                            include 'perma/institutes.php';
                            $text = "";
                            foreach ($institutes as $insti)
                            {
                                $text .= "<option value=\"{$insti}\">{$insti}</option>";
                            }
                            echo $text;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan = "2" align="center">
                    <input type="submit" style="width:300px;height:40px;font-size: 20px" value="submit" />
                </td>
            </tr>
        </table>
            </form>
    </div>
<?php include("perma/footer.php");?>	
	
</body>
</html>