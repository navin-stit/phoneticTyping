<?php
//print_r($_POST);
require_once("typingadmin/koneksi.php");

$data = "";
$loadlesson = mysql_query("SELECT * FROM user_lastlesson WHERE username='".$_POST['username']."' ORDER BY date DESC LIMIT 1");
while($row = mysql_fetch_array($loadlesson)) {
	$data .= $row['lesson_soal'];
	$data .= "|";
	$data .= $row['lesson_count'];
}

echo $data;
?>