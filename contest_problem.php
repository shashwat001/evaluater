<?php
if(isset($_GET["prob_code"]))
{
    $code = $_GET['prob_code'];
    $filename = "../../prob/{$code}/prob.txt";
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
}
else
{
    $tstamp = strtotime("now");
    $contestcode = $_GET['contestcode'];
    require '../../db_config.php';
    $query = "SELECT * FROM contests where code='{$contestcode}'";
    $result = mysql_query($query) or die(mysql_error());
    $record = mysql_fetch_array($result);
    if($record['stime'] > $tstamp)
    {
        echo "Contest Yet to start";
    }
    else
    {
        
        $query = "SELECT * FROM %s ";
        $result = mysql_query($query) or die(mysql_error());
        echo "<h1>CONTEST : %s</h1><br>";
        $outstr = "<table class=\"prob_table\">";
        $outstr .= "<tr><th>NAME</th><th>CODE</th><th>SUBMISSIONS</th><th>ACCURACY</th></tr>";
        while($record = mysql_fetch_array($result))
        {
            $accuracy = 0;
            if($record['submissions'] == 0)
                $accuracy = 0;
            else
            {
                $accuracy = round($record['correct_submissions']/$record['submissions'],3);
            }
            $outstr .= "<tr class=\"prob_row\"><td><a href=\"../../problem.php?code={$record['code']}\">{$record['name']}</a></td>
                        <td>{$record['code']}</td>
                        <td>{$record['correct_submissions']}/{$record['submissions']}</td><td>{$accuracy}</td></tr>";

        }
        $outstr .= "</table>";
        echo $outstr;
    }
}
?>
