<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
  	<script src="js/jquery-1.9.1.js"></script>
  	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/myjquery.js"></script>
        <?php  $username=$_GET["username"];  
        echo "<title>{$username}</title>"
        ?>
	<script>
            function edit()
            {
                document.getElementById('ShowDetailsDiv').style.display="none";
                document.getElementById('EditDetailsDiv').style.display="block";
            }
        </script>
</head>
<body>
<?php include("perma/header.php");?>	

<?php require 'db_config.php'; 
$query = "SELECT * FROM users WHERE username='{$_GET["username"]}'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if($count == 0)
        {
            mysql_close($con);
            echo "<div style=\"min-height:550px;\">NO USER FOUND</div>";
            
        }
        else
        {            
            $record = mysql_fetch_array($result);
            $firstname = $record['first_name'];
            $lastname = $record['last_name'];
            $email = $record['email'];
            $country = $record['country'];
            $address = $record['address'];
            $phone = $record['phone'];
            $insti = $record['institute'];
            $datejoin = $record['date_joining'];
            $time = gmdate("Y-m-d", $datejoin);
            $password = $record['password'];
            $submission = $record['submissions'];
            $AC = $record['AC'];
            $WA = $record['WA'];
            $TLE = $record['TLE'];
            $CE = $record['CE'];
            $RE = $record['RE'];
            $score = $record['score'];
            $PS = $record['PS'];
            mysql_close($con);
            echo "<div id=\"ShowDetailsDiv\">
            <table id=\"ProfileTable\">";
            if(isset($_SESSION['username']) && $_SESSION['username']==$username)
            {
              echo  "<tr style=\"padding-bottom: 50px\">
                <td  align=\"left\">
                    <span style=\"font: bold 30px sans-serif \">Details of {$username}</span>
                </td>
                <td  align=\"center\">
                    <input type=\"button\" value=\"Edit Details\" onclick=\"javascript:edit()\" style=\"width:300px;height:30px\"/>
                </td>
            </tr>";
            }
            else
            {
              echo  "<tr style=\"padding-bottom: 50px\">
                <td  align=\"left\" colspan=\"2\">
                    <span style=\"font: bold 30px sans-serif \">Details of {$username}</span>
                </td>
            </tr>";
            }
            echo "<tr>
                <td>
                    <span>Date Joined: </span>
                </td>
                <td align=\"left\">
                    <span>{$time} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>First Name: </span>
                </td>
                <td align=\"left\">
                    <span>{$firstname}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Last Name: </span>
                </td>
                <td align=\"left\">
                    <span>{$lastname}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Email Id: </span>
                </td>
                <td align=\"left\">
                    <span>{$email}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Country: </span>
                </td>
                <td align=\"left\">
                    <span>{$country}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Address: </span>
                </td>
                <td align=\"left\">
                    <span>{$address}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Phone: </span>
                </td>
                <td align=\"left\">
                   <span>{$phone}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Institute: </span>
                </td>
                <td align=\"left\">
                    <span>{$insti}</span>
                </td>
            </tr>
        </table>   
        <table id=\"Solutions\" border=\"1\">
        <tr>
            <th>
                Problem Solved
            </th>
            <th>
                Solution Submitted
            </th>
            <th>
                Solutions Accepted
            </th>
            <th>
                Wrong Answer
            </th>
            <th>
                Compile Error
            </th>
            <th>
                Runtime Error
            </th>
            <th>
                Time Limit Exceeded
            </th>
            <th>
                Score
            </th>
        </tr>
        <tr>
            <td>
                {$PS}
            </td>
            <td>
                {$submission}
            </td>
            <td>
                {$AC}
            </td>
            <td>
                {$WA}
            </td>
            <td>
                {$CE}
            </td>
            <td>
                {$RE}
            </td>
            <td>
                {$TLE}
            </td>
            <td>
                {$score}
            </td>
        </tr>
    </table>
            </div>";
            echo "<div id=\"EditDetailsDiv\">
                <form action=\"update.php\" method=\"post\">
        <table id=\"EditProfileTable\">
            <tr style=\"padding-bottom: 50px\" colspan=\"2\">
                <td  align=\"left\">
                    <span style=\"font: bold 30px sans-serif \">Updates Details</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>First Name: </span>
                </td>
                <td align=\"center\">
                    <input type=\"text\" id=\"firstName\" name=\"firstname\" class=\"inputText\" style=\"width:300px\" value=\"{$firstname}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Last Name: </span>
                </td>
                <td align=\"center\">
                    <input type=\"text\" id=\"lastName\" name=\"lastname\" class=\"inputText\" style=\"width:300px\" value=\"{$lastname}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Email Id: </span>
                </td>
                <td align=\"center\">
                    <input type=\"text\" id=\"emailId\" name=\"emailid\" class=\"inputText\" style=\"width:300px\" value=\"{$email}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Password: </span>
                </td>
                <td align=\"center\">
                    <input type=\"password\" id=\"password\" name=\"password\" class=\"inputText\" style=\"width:300px\" value=\"{$password}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Country: </span>
                </td>
                <td align=\"center\">
                    <input type=\"text\" id=\"country\" name=\"country\" class=\"inputText\" style=\"width:300px\" value=\"{$country}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Address: </span>
                </td>
                <td align=\"center\">
                    <input type=\"text\" id=\"address\" name=\"address\" class=\"inputText\" style=\"width:300px\" value=\"{$address}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Phone: </span>
                </td>
                <td align=\"center\">
                    <input type=\"text\" id=\"phone\" name=\"phone\" class=\"inputText\" style=\"width:300px\" value=\"{$phone}\"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Institute: </span>
                </td>
                <td align=\"center\">
                    <select name=\"institute\" id=\"institute\" class=\"inputText\" style=\"width: 400px\" >";
                      
                            include 'perma/institutes.php';
                            $text = "";
                            foreach ($institutes as $institu)
                            {
                                if($institu==$insti)
                                {
                                    $text .= "<option selected=\"selected\" value=\"{$institu}\">{$institu}</option>";
                                }
                                else 
                                {
                                    $text .= "<option value=\"{$institu}\">{$institu}</option>";
                                }
                            }
                            echo $text;
                       
                 echo   "</select>
                </td>
            </tr>
            <tr>
                <td colspan = \"2\" align=\"center\">
                    <input type=\"submit\" style=\"width:300px;height:40px;font-size: 20px\" value=\"Save Update\" />
                </td>
            </tr>
        </table>
    </form>
    
            </div>";
        }



?>
<?php include("perma/footer.php");?>	
	
</body>
</html>