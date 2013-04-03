<?php
     $code = $_GET['code'];
     $filename = "prob/{$code}/prob.txt";
     $text = file_get_contents($filename);
     echo $text;
 ?>