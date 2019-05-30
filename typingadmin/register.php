<?
include("header.php");
include ("koneksi.php");

$pangkat = 0;
$verifikasi = "false";
$hariIni = date("Y-m-d");

if ($_POST['namaLogin'] == "") {
	echo "-";
} else if ($_POST['namaLogin'] == "" || $_POST['namaLengkap'] == "" || $_POST['password'] == "" || $_POST['repassword'] == "") {
	echo "<center>";
	echo "<font color='red'><b>Data tidak bisa disimpan, karena Data tidak lengkap</b></font>";
	echo "</center>";
} else if ($_POST['password'] != $_POST['repassword']) {
	echo "<center>";
	echo "<font color='red'><b>Password tidak sama</b></font>";
	echo "</center>";
} else {
	$cekNama = mysql_query("SELECT * FROM user WHERE namaLogin='". $_POST['namaLogin'] ."'");
	$jumlahData = mysql_num_rows($cekNama);
	echo "jumlahData : " + $jumlahData . "<br/>";
	if ($jumlahData > 0) {
		echo "<center>";
		echo "<font color='red'><b>nama login sudah ada, tolong beri nama yang lain</b></font>";
		echo "</center>";
	} else {
	
		$hasilInsert = mysql_query("INSERT INTO user VALUES ('$_POST[namaLogin]',
																'$_POST[namaLengkap]',
																'$_POST[telepon]',
																'$_POST[email]',
																'$_POST[website]',
																'$_POST[password]',
																'$_POST[cbJabatan]',
																'$pangkat',
																'$verifikasi',
																'$hariIni')",$con);
		
		if (!hasilInsert)
		{
			die ("gagal Simpan, karena Error : ". mysql_error());
		} else {
			echo "<center>";
			echo "<b>user berhasil disimpan</b>";
			echo "</center>";
			echo "<script>window.location='signupSukses.php?namaLogin=$_POST[namaLogin]';</script>";
		}
		
		mysql_close($con);
	}
}
?>
<head>
	<title>Register user</title>
</head>
<body background="image/bg.gif">
<br/>
<table align="center" width="700" border="0">
	<form action="register.php" method="POST">
	
	<tr>
		<td width="150">Nama Login </td><td> <input type="text" name="namaLogin"/></td>
	</tr>
	<tr>
		<td>Nama Lengkap </td><td><input type="text" name="namaLengkap"/></td>
	</tr>
	<tr>
		<td>Telepon / hp </td><td><input type="text" name="telepon"/></td>
	</tr>
	<tr>
		<td>Email </td><td><input type="text" name="email"/></td>
	</tr>
	<tr>
		<td>Website </td><td><input type="text" name="website"/></td>
	</tr>
	<tr>
		<td>Password </td><td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td>Ulangi password </td><td><input type="password" name="repassword"/></td>
	</tr>
	<tr>
		<td>Jabatan </td>
		<td>
			<select name="cbJabatan">
				<option value="keuangan">keuangan</option>
				<option value="administrasi">administrasi</option>
				<option value="marketing">marketing</option>
			</select>
		</td>
	</tr>
	<tr>
		<td></td><td><input type="submit" value="simpan"/> <input type="reset" value="reset"/></td>
	</tr>
	
	</form>
</table>

</body>