<?php 
    $prob_category = array("problems_easy","problems_medium","problems_hard");
    function send($index)
    {
        global $prob_category;
        require 'db_config.php';
        $query = "SELECT * FROM {$prob_category[$index]}";
        $result = mysql_query($query) or die(mysql_errno());
        $outstr = "<table class=\"prob_table\">";
        
        while($record = mysql_fetch_array($result))
        {
            $accuracy = 0;
            if($record['submissions'] == 0)
                $accuracy = 0;
            else
            {
                $accuracy = $record['correct_submissions']/$record['submissions'];
            }
            $outstr .= "<tr class=\"prob_row\"><td><a href=\"problem.php?code={$record['code']}\">{$record['name']}</a></td>
                        <td>{$record['code']}</td>
                        <td>{$record['correct_submissions']}/{$record['submissions']}</td><td>{$accuracy}</td></tr>";

        }
        $outstr .= "</table>";
        echo $outstr;
        mysql_close($con);
    }
?>





<div id="tabs">
        <ul>
                <li><a href="#tabs-1">Easy</a></li>
                <li><a href="#tabs-2">Medium</a></li>
                <li><a href="#tabs-3">Hard</a></li>
        </ul>
        <div id="tabs-1">
            <?php send(0);?>
        </div>
        <div id="tabs-2">
            <?php send(1);?>
        </div>
        <div id="tabs-3">
            <?php send(2);?>
        </div>
</div>