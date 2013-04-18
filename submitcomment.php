<?php
    session_start();
    require_once 'db_config.php';
    $code = $_POST['code'];
    $username = $_POST['username'];
    $text = $_POST['text'];
    
    $query = "SELECT MAX(comment_id) as count FROM comments";
    $result = mysql_query($query)or die(mysql_error());
    $record = mysql_fetch_array($result);
    $count = $record['count'];
    $newcount = $count+1;
    
    $text = mysql_real_escape_string($text);
    
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    
    $query = "INSERT INTO comments values ({$newcount},'{$username}','{$code}','{$text}',{$timestamp})";

    mysql_query($query)or die(mysql_error());
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
