<?php
//print_r($_FILES);

$file_name = $_FILES['txtFile0']['name'];
$target_file = "voice/lessons/".basename($file_name); 
$cek = move_uploaded_file($_FILES["txtFile0"]["tmp_name"], $target_file);

if($cek) {
	//ganti txt files
	
	//copy uploaded file in allsounds folder
	$target_file1 = "typing/voice/allsounds/".basename($file_name); 
	$cek1 = copy($target_file, $target_file1);
	if($cek1){
		//echo 'yes';die;
	}else{
		//echo 'no';die;
	}
} else {
	//echo "gagal";
}
?>