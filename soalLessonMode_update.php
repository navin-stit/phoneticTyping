<?php
//print_r($_POST);

$myFile = "lessonmode.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$kata = $_POST['isilesson'];

fwrite($fh, $kata);
?>