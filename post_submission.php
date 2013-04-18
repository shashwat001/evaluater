<?php

function isaccepted($username,$code)
{
    $query = "SELECT count(*) as count FROM submissions WHERE username='{$username}' and problem_code='{$code}' and status='AC'";
    $result = mysql_query($query) or die(mysql_error());
    $record = mysql_fetch_array($result) or die(mysql_error());

    if($record['count'] == 1)
        return 0;
    else return 1;
}

function post_submission($record, $status,$time = 0.00)
{
    $prob_category = array("problems_easy","problems_medium","problems_hard");
    $score = array(10,20,30);
    
    $query = "UPDATE submissions SET status='{$status}', time={$time} WHERE sub_id={$record['sub_id']}";
    mysql_query($query) or die(mysql_error());
    
    $query = "DELETE FROM pending WHERE sub_id={$record['sub_id']}";
    mysql_query($query) or die(mysql_error());
    
    $query = "SELECT category FROM problems WHERE code='{$record['problem_code']}'";
    $result = mysql_query($query) or die(mysql_error());
    $probrecord = mysql_fetch_array($result) or die(mysql_error());
    
       
    $query = "SELECT submissions, correct_submissions FROM {$prob_category[$probrecord['category']]} WHERE code='{$record['problem_code']}'";
    $result = mysql_query($query) or die(mysql_error());
    
    $temprecord = mysql_fetch_array($result);
    $newsubmissions = $temprecord['submissions']+1;
    
    $query = "UPDATE {$prob_category[$probrecord['category']]} SET submissions={$newsubmissions} WHERE code='{$record['problem_code']}'";
    mysql_query($query) or die(mysql_error());
    
    if($status == "AC")
    {
        $newcorrectsubmissions = $temprecord['correct_submissions']+1;
        $query = "UPDATE {$prob_category[$probrecord['category']]} SET correct_submissions={$newcorrectsubmissions} WHERE code='{$record['problem_code']}'";
        mysql_query($query) or die(mysql_error());
    }
    
    $query = "SELECT submissions, {$status}, score, PS FROM users WHERE username='{$record['username']}'";
    $result = mysql_query($query) or die(mysql_error());
    $userrecord = mysql_fetch_array($result);
    $newusersubmissions = $userrecord['submissions']+1;
    $statussubmission = $userrecord["{$status}"] + 1;
    $problem_solved = $userrecord['PS'];
    

    $newscore = $userrecord['score'];
    if($status == "AC")
    {

        $check = isaccepted($record['username'], $record['problem_code']);
        if($check == 0)
        {

            $newscore += $score[$probrecord['category']];
            $problem_solved += 1;
        }
    }
    
    $query = "UPDATE users SET submissions={$newusersubmissions}, {$status}={$statussubmission}, score={$newscore}, PS={$problem_solved} WHERE username='{$record['username']}'";
    mysql_query($query) or die(mysql_error());
    
    
    
    
    
    

}
?>
