<?php
require_once("koneksi.php");

//print_r($_POST);

$updatedata = mysql_query("UPDATE user_record SET keterangan='".$_POST['up_lesson']."', score='".$_POST['up_score']."' WHERE no='".$_POST['up_id']."'");
if($updatedata) {
	echo "Sukses";
} else {
	echo "Err";
}
?>