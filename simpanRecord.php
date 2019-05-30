<?php

require_once("typingadmin/koneksi.php");

$id = $_GET['id'];
$nama = $_GET['namaUser'];
$waktu = "00:00:00";
$score = 0;
$ket = $_GET['LessonSelesai'];
$hariini = date("Y-m-d");
//echo $hariini;

$jumlahHuruf = $_GET['jumlahHuruf'];
$salah = $_GET['salah'];

$score = $_GET['score'];

$caridatasama = mysql_query("SELECT * FROM user_record WHERE id='".$id."' AND keterangan='".$ket."' AND recorddate='".$hariini."'");
$jumlahData = mysql_num_rows($caridatasama);

if($jumlahData==0) {
	$simpanRecord = mysql_query("INSERT INTO user_record
	(id,
	nama,
	waktu,
	score,
	tanggal,
	recorddate,
	keterangan) VALUES
	('".$id."',
	'".$nama."',
	'".$waktu."',
	'".$score."',
	now(),
	now(),
	'".$ket."')");

	if($simpanRecord) {
		echo "Simpan Berhasil";
	} else {
		echo "Simpan Gagal " . mysql_error();
	}
} else {
	echo "Simpan Batal" . mysql_error();
}
?>

