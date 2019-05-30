<?php
require_once("koneksi.php");
$hapus = mysql_query("DELETE FROM user_allow WHERE id='".$_POST['iduser']."'");
if(!$hapus) {
	echo "Err " . mysql_error();
}
?>