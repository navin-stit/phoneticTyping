<?php
require_once("koneksi.php");

$chk_user = mysql_query("Select * from user_allow where username='".$_POST['txtNewUser']."'");
if (mysql_num_rows($chk_user) > 0) {
	echo "<script>alert('User name already exits.');window.location.href='add_user.php'</script>";
}else{	

	$simpandata = mysql_query("INSERT INTO user_allow 
	(username, status, date_create) 
	VALUES 
	(
	'".$_POST['txtNewUser']."',
	'1',
	now()
	)");

	if($simpandata) {
		echo "<script>window.location.href='add_user.php'</script>";
	} else {
		echo "err " . mysql_error();
	}

}
?>