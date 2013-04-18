<table style="width: 100%">
<tr>
    <td align="center">
<a href="submit_prob.php" style=" padding: 10px;font: large sans-serif;">Submit New Problem</a>
</td>
</tr>
<!--<tr>
    <td>
<div id="contests" style=" padding: 10px;font: large sans-serif;">
    Contest is helding.

</div></td>
</tr>-->
<tr>
    <td align="center">
        Recent Submissions:
        </td>
    </tr>
<tr>
    <td>
<div id="cursubmissions">
    
    


<?php 
    require 'db_config.php'; 

        $query = "SELECT * FROM submissions ORDER BY sub_id DESC LIMIT 10";
        $result = mysql_query($query) or die(mysql_error());
 
            
            echo "<table  style=\"width:100%; height:100%\">";
            while($record=mysql_fetch_array($result))
            {
                $username = $record['username'];
                $prob_code=$record['problem_code'];
                $language=$record['language'];
                $status=$record['status'];
                echo "<tr>
                    <td>
                        <a href=\"profile.php?username={$username}\">{$username}</a>
                    </td>
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
                        echo "</td></tr>";
            }
            echo "</table>";

?>
	
	

</div></td>
</tr>
</table>