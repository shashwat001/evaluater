<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
  	<script src="js/jquery-1.9.1.js"></script>
  	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/myjquery.js"></script>
</head>
<body>
<?php include("perma/header.php");?>	

<?php require 'db_config.php'; 
if(isset($_SESSION['username']))
{
        $query = "SELECT * FROM submissions WHERE username='{$_SESSION['username']}' ORDER BY sub_id DESC";
        $result = mysql_query($query) or die(mysql_error());
        $count = mysql_num_rows($result);
        if($count == 0)
        {
            mysql_close($con);
            echo "<div style=\"min-height:550px;\">NO PROBLEM SUBMITTED</div>";
            
        }
        else
        {            
            
            
            echo "<div id=\"ShowSubmissionsDiv\">
            <table id=\"SubmissionsTable\" border=\"1\">";
            echo "<tr>
                    <th>
                        Problem Code
                    </th>
                    <th>
                       Language
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Execution Time
                    </th>
                </tr>";
            while($record=mysql_fetch_array($result))
            {
                $prob_code=$record['problem_code'];
                $language=$record['language'];
                $status=$record['status'];
                $time=$record['time'];
                echo "<tr>
                    <td>
                        <a href=\"problem.php?code={$prob_code}\">{$prob_code}</a>
                    </td>
                    <td align=\"center\">
                       {$language}
                    </td>
                    <td align=\"center\">";
                        if($status=="AC")
                        {
                          echo "<img src=\"images/tick-icon.gif\" title=\"accepted\"/>"; 
                        }
                        else if($status=="WA")
                        {
                            echo "<img src=\"images/cross-icon.gif\" title=\"wrong answer\"/>"; 
                        }
                        else if($status=="CE")
                        {
                            echo "<img src=\"images/alert-icon.gif\" title=\"compile time error\"/>"; 
                        }
                        else if($status=="RE")
                        {
                            echo "<img src=\"images/runtime-error.png\" title=\"run time error\"/>"; 
                        }
                        else if($status=="TLE")
                        {
                            echo "<img src=\"images/clock_error.png\" title=\"time limit exceeded\"/>"; 
                        }
                        else
                        {
                            echo $status;
                        }
                    echo "</td>
                    <td align=\"center\">
                        {$time}
                    </td>
                </tr>";
            }
           echo "</table>";
        }
}
else
{
    header('Location:login.php');
}

mysql_close();
?>
<?php include("perma/footer.php");?>	
	
</body>
</html>