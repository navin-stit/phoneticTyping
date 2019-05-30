<?php
//print_r($_POST);

require_once("koneksi.php");

$updatedata = mysql_query("UPDATE user_allow SET status='".$_POST['statusChange']."' WHERE id='".$_POST['userid']."'");
if($updatedata) {
	echo "Sukses";
} else {
	echo "Err";
}
?>