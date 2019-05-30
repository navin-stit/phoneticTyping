<html>
	<html>
<head>
	<title>Upload Picture Progress</title>
	<STYLE TYPE="text/css">
	.darkrow, .darkrow TD, .darkrow TH
	{
	background-color:blue;
	color:white;
	}
	</STYLE>

</head>
<body background="../image/bg.gif">
	<?php
	require_once("koneksi.php");
	
	if ($_FILES['txtPhoto']['size'] >= 100000) {
		echo "<script>alert('Picture Size is to big')</script>";
		echo "<script>window.location.href='uploadPicture.php'</script>";
	} else {
		
		$allowed =  array('gif','png' ,'jpg');
		$ext = pathinfo($_FILES['txtPhoto']['name'], PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
			echo "<script>alert('File extension not valid.');</script>";
			echo "<script>window.location.href='uploadPicture.php'</script>";
		}
		
		//echo '<pre>';print_r($_FILES);
		$folderPhoto = "../images/";
		$target_path =  $folderPhoto . basename($_FILES['txtPhoto']['name']);
		//echo "PHOTO : " . $target_path . "<br/>";
		$prosesUpload = move_uploaded_file($_FILES['txtPhoto']['tmp_name'], $target_path);
		//echo "PROSES : " . $prosesUpload;die;
		
		if ($prosesUpload) {
			//echo "<script>alert('Upload Success!')</script>";
			//echo "<script>window.location.href='uploadPicture.php'</script>";
			
			$simpanPic = mysql_query("INSERT INTO ms_picture (name_photo, size_photo, type_photo, upload_date) VALUES ('".$_FILES['txtPhoto']['name']."','".$_FILES['txtPhoto']['size']."','".$_FILES['txtPhoto']['type']."',now())");
			if ($simpanPic) {
				echo "<script>alert('Upload Success!')</script>";
				echo "<script>window.location.href='uploadPicture.php'</script>";
			} else {
				echo "<script>alert('Upload Failed')</script>";
				echo "<script>window.location.href='uploadPicture.php'</script>";
			}
		} else {
			echo "<script>alert('Upload Failed')</script>";
			echo "<script>window.location.href='uploadPicture.php'</script>";
		}
	}
	?>
</body>
</html>