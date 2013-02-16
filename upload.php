<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  move_uploaded_file($_FILES["file"]["tmp_name"],
      "sq1.cpp");
  }
?>
