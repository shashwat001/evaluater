<?php
     $code = $_GET['code'];
     $filename = "prob/{$code}/prob.txt";
     $text = file_get_contents($filename);
     echo $text;
     
     if(isset($_SESSION['username']))
     {
         echo "<hr />";
         echo "<form action=\"solution.php\" enctype=\"multipart/form-data\" method=\"post\">".
                "<input type=\"file\" name=\"solfile\" id=\"solfile\">".
                "<select name=\"lang\">".
                    "<option value=\"c\">C</option>".
                    "<option value=\"cpp\">C++</option>".
                "</select>".
                "<br>".
                "<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Submit\" />".
                "<input type=\"hidden\" value=\"{$code}\" name=\"code\" />".
                "</form>";
     }
         
 ?>
<hr />
<h3>Comments</h3>
<div class="allcomments" >
    
    <?php
     require_once 'db_config.php';
    $query = "SELECT * FROM comments WHERE code='{$code}' ORDER BY comment_id";
    $result = mysql_query($query)or die(mysql_error());
    $ret = "";
    while($record = mysql_fetch_array($result))
    {
        $comment_time = $record['time'];
        $comment_time = gmdate("Y-m-d", $comment_time);
        $ret .=     
        "<div id=\"{$record['comment_id']}\"class=\"comments\">".
        "<div class=\"commentor\">".
            "<table style=\"width: 100%;padding-left:0px;\">".
                "<tr>".
                    "<td align=\"left\">{$record['username']}</td>".
                    "<td align=\"right\">{$comment_time}</td>".
                "</tr>".
            "</table>".
        "</div>".
        "<div class=\"commentbody\">{$record['text']}</div>";
        if(isset($_SESSION['username']))
        {
            if($record['username'] == $_SESSION['username'])
                $ret .="<button onclick=\"del_comment(this)\">Delete</button>";
        }
        $ret .= "</div>";
    }
    mysql_close($con);
    echo $ret;
    ?>
</div>

<?php
if(isset($_SESSION['username']))
{
    echo "<div class=\"newcomment\" id=\"newcomment\" >";
    echo "Submit a Comment:<br>";
    echo "<textarea id=\"commentsubbox\" name=\"commentsubbox\" rows=\"5\" cols=\"50\">";

    echo "</textarea>";
    echo "</div>";
    echo "<button name=\"submitcomment\" id=\"submitcomment\" onclick=\"comment_submit('{$code}','{$_SESSION['username']}')\">Submit</button>";
}
else
{
    echo "You need to login to post comment";
}
?>
