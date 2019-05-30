<?php
//print_r($_FILES);

$realname = $_FILES['txtFile0']['name'];
$customname = "lessonmode.txt";
$cek = move_uploaded_file($_FILES["txtFile0"]["tmp_name"], $customname);

if($cek) {
	//echo "sukses";
} else {
	//echo "gagal";
}
?>