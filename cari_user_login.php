<?php
require_once("typingadmin/koneksi.php");

$cariuser = mysql_query("SELECT * FROM user_allow WHERE status='1'");
while($row = mysql_fetch_array($cariuser)) {
	echo $row['username'];
	echo ",";
}
?>