<?php
    require_once 'db_config.php';
    $id = $_POST['id'];


    
    $query = "DELETE FROM comments WHERE comment_id={$id}";

    mysql_query($query)or die(mysql_error());
    
    mysql_close($con);
?>
