<?php
require_once("koneksi.php");

//print_r($_POST);
$hapusdata = mysql_query("DELETE FROM user_record WHERE no='".$_POST['userno']."'");
if($hapusdata) {
	echo $_POST['nama'];
} else {
	echo $_POST['nama'];
}
?>