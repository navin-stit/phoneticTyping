<body background="image/bg.gif">
	
<?
require_once("header.php");
require_once("koneksi.php");

$cekUser = mysql_query("SELECT * FROM user WHERE namaLogin='".$_POST['userAnggota']."' && verifikasi='false' && pangkat=0");
$jumlahUser = mysql_num_rows($cekUser);

while ($row = mysql_fetch_array($cekUser)) {
	$namaLoginAnggota = $row[namaLogin];
	$namaLengkapAnggota = $row[namaLengkap];
	$teleponAnggota = $row[telepon];
	$emailAnggota = $row[email];
	$websiteAnggota = $row[website];
	$jabatanAnggota = $row[jabatan];
}

//jika nama user ada
if($jumlahUser>0) {
	$cekLogin = mysql_query("SELECT * FROM user WHERE namaLogin='".$_POST['userLogin']."' && password='".$_POST['userPass']."'");
	$jumlahLogin = mysql_num_rows($cekLogin);
	
	//jika login berhasil
	if ($jumlahLogin > 0) {
		//Mencari pangkat user login
		while ($row = mysql_fetch_array($cekLogin)) {
			$pangkat = $row[pangkat];
		}
		
		//Menentukan pangkat bawahan
		if ($pangkat == 9) {
			$userAnggotaPangkat = 2;
		} else if ($pangkat == 2) {
			$userAnggotaPangkat = 1;
		}
		
		$updateAnggota = mysql_query("UPDATE user SET pangkat='".$userAnggotaPangkat."', verifikasi='true' WHERE namaLogin='".$namaLoginAnggota."'");
		if ($updateAnggota) {
			echo "
				<center>
					<br/><br/>
					<h3><b><font color='blue'>Anggota berhasil di verifikasi</font></b></h3>
					<table border='0'>
						<tr>
							<td>Nama Login : </td>
							<td>$namaLoginAnggota</td>
						</tr>
						<tr>
							<td>Nama Lengkap : </td>
							<td>$namaLengkapAnggota</td>
						</tr>
						<tr>
							<td>Telepon : </td>
							<td>$teleponAnggota</td>
						</tr>
						<tr>
							<td>Email : </td>
							<td>$emailAnggota</td>
						</tr>
						<tr>
							<td>Website : </td>
							<td>$websiteAnggota</td>
						</tr>
						<tr>
							<td>Jabatan : </td>
							<td>$jabatanAnggota</td>
						</tr>
					</table>
					<br/><br/>
					<a href='index.php'>Klik disini untuk kembali ke Menu utama</a>
					<br/><br/><br/><br/>
				</center>
			";
		}
	} else {
		echo "
			<center>
				<br/><br/>
				<h3><b><font color='red'>Login atau Password Login Salah</font></b></h3>
				<a href='index.php'>Klik disini untuk kembali ke Menu utama</a>
				<br/><br/><br/><br/>
			</center>
		";
	}
} else {
	echo "
		<center>
			<br/><br/>
			<h3><b><font color='red'>nama user anggota tidak ada atau sudah terverifikasi</font></b></h3>
			<a href='index.php'>Klik disini untuk kembali ke Menu utama</a>
			<br/><br/><br/><br/>
		</center>
	";
}
?>

</body>