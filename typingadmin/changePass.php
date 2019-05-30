<?php require_once("header.php");
//echo '<pre>';print_r($_SESSION);
?>

<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="style.css">	
</head>

<body background="image/bg.gif">
	<br/>
	<table border="1" align='center' width='700' rules="cols" frame="box" bgcolor="white" class="shadow_table">
		<form action="updatePass.php" method="POST">
		<tr>
			<td>Login Name</td><td> <?php echo (isset($_SESSION['namaUser']) && !empty($_SESSION['namaUser']))?$_SESSION['namaUser']:"";?></td>
			<input type="hidden" name="namaUser" value="<?php echo (isset($_SESSION['namaUser']) && !empty($_SESSION['namaUser']))?$_SESSION['namaUser']:"";?>" />
		</tr>
		<tr>
			<td>Old Password</td><td> <input type="password" name="passLama" required /></td>
		</tr>
		<tr>
			<td>New Password</td><td> <input type="password" name="passBaru" required /></td>
		</tr>
		<tr>
			<td>Retype Password</td><td> <input type="password" name="ulangiPass" required /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><hr/><input type="submit" value="CHANGE" /></td>
		</tr>
		</form>
	</table>
	<br/><br/><br/>
	<center>
		<a href="index.php">HOME</a>
	</center>
</body>

</html>