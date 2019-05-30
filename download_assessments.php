<?php
$file = "assessments.txt";
$type = filetype($file);
$today = date("F j, Y, g:i a");
$time = time();
// Send file headers
header("Content-type: $type");
header("Content-Disposition: attachment;filename=$file");
header("Content-Transfer-Encoding: binary"); 
header('Pragma: no-cache'); 
header('Expires: 0');
// Send the file contents.
set_time_limit(0); 
readfile($file);
?>