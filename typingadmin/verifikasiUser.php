<?
require_once("header.php");
?>

<body background="image/bg.gif">
	<br/>
	<table border="0" align='center' width='700'>
		<form action="prosesUserBelumVerifikasi.php" method="POST">
		<tr>
			<td width="50">User anggota </td>
			<td width="150"><input type="text" name="userAnggota"/></td>
		</tr>
		<tr>
			<td colspan="3"><hr/></td>
		</tr>
		
		
		<tr>
			<td width="50">Nama Login Anda</td>
			<td width="150"><input type="text" name="userLogin"/></td>
		</tr>
		<tr>
			<td width="50">Password Anda</td>
			<td width="150"><input type="password" name="userPass"/></td>
		</tr>
		<tr>
			<td></td>
			<td width="150"><input type="submit" value="verifikasi user"/></td>
		</tr>
		</form>
	</table>
	
	<center>
	<br/><br/>
		<a href='index.php'>kembali ke menu</a>
	</center>
</body>