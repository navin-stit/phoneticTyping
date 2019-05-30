<?php
include("koneksi.php");

if(isset($_POST['passLama'])) {
	//echo $_POST['namaUser'] . " | " . $_POST['passLama'] . "<br/>";
	$cekLogin = mysql_query("SELECT * FROM user WHERE namaLogin='".$_POST['namaUser']."' && password='".$_POST['passLama']."'");
	$jumlahData = mysql_num_rows($cekLogin);
	//echo $jumlahData;die;
	
	if ($jumlahData > 0) {
		$updatePass = mysql_query("UPDATE user SET password='".$_POST['passBaru']."' WHERE namaLogin='".$_POST['namaUser']."'");
		
		if ($updatePass) {
			echo "<center>";
			echo "<h3>Password has been changed</h3>";
			echo "Login Name : " . $_POST['namaUser'] . "<br/>";
			echo "New Password : " . $_POST['passBaru'] . "<br/>";
			echo "<a href='index.php'>Click here to back</a>
				<br/><br/><br/><br/>";
			echo "</center>";	
		}
	} else {
		echo "
			<center>
			<br/><br/>
				<h3><b><font color='red'>Old password is wrong</font></b></h3>
				Password is not changed<br/>
				<a href='index.php'>Click here to back</a>
				<br/><br/><br/><br/>
			</center>
		";
	}
}
?>