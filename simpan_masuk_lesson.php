<?php
print_r($_POST);

require_once("typingadmin/koneksi.php");
$simpandata = mysql_query("INSERT INTO user_lastlesson 
(userid, username, lesson_soal, lesson_count, date)
VALUES 
('".$_POST['userid']."',
'".$_POST['username']."',
'".$_POST['lessonsoal']."',
'".$_POST['lessoncount']."',
now())
");
?>