<?php
require_once("typingadmin/koneksi.php");

$username=$_GET['username'];
/*$loadRecord = mysql_query("SELECT *
FROM user_record
WHERE recorddate
BETWEEN CURRENT_DATE( ) - INTERVAL 1 DAY 
AND 
NOW( )
AND nama='wirawan'
ORDER BY recorddate DESC");*/

$hariini = date("Y-m-d");
$data = "";
$loadRecord = mysql_query("SELECT * FROM user_record WHERE nama='".$username."' ORDER BY tanggal DESC");
//$loadRecord = mysql_query("SELECT * FROM user_record WHERE nama='wirawan'");
//$loadRecord = mysql_query("SELECT * FROM user_record");
while($row = mysql_fetch_array($loadRecord)) {
	//$data = "";
	
	$id = $row['id'];
	$nama = $row['nama'];
	$waktu = $row['waktu'];
	$score = $row['score'];
	$tanggal = $row['tanggal'];
	$recorddate = $row['recorddate'];
	$keterangan = $row['keterangan'];
	
	$data .= "id=$id|nama=$nama|waktu=$waktu|score=$score|tanggal=$tanggal|keterangan=$keterangan|recorddate=$recorddate";
	$data .= ";";
	//echo $data;
	//echo "<br/>";
	
	if ($hariini !== $row['recorddate']) {
		break;
	}
	
	
}

$data .= "sekarang=".$hariini;

echo $data;
?>