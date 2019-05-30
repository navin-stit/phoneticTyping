<html>
<head>
<title>Upload Picture</title>
<link rel="stylesheet" type="text/css" href="style.css">	
</head>

<body background="../image/bg.gif">
<?php
	require_once("koneksi.php");
	require_once("header.php");
	//require_once("tblBarisLogin.php");
	
	//***************************************************************
	echo "<form enctype='multipart/form-data' name='formUploadPicture' action='addNewPicture.php' Method='POST'>";
		echo "<table width='700' border='1' align='center' rules=none frame=box bgcolor='#BAD9F3'>";
		
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<td align='center' colspan='2'><b>Upload Picture</b></td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td align='right'>New Picture : </td>";
			echo "<input type='hidden' name='MAX_FILE_SIZE' value='100000' />";
			echo "<td><input type='file' id='idPhoto' name='txtPhoto' /> </td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>&nbsp;</td>";
			echo "<td align='left'><input value='Upload' type='submit' onclick='validateForm();return false;' /></td>";
		echo "</tr>";
		
		echo "</table>";
	echo "</form>";
	
	$folderPhoto = "../images/";
	$cariGambar = mysql_query("SELECT * FROM ms_picture");
	echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
		echo "<tr>";
		while ($row = mysql_fetch_array($cariGambar)) {
			echo "<td><img height='100' width='100' src='".$folderPhoto . $row['name_photo']."'/></td>";
		}
		echo "</tr>";
	echo "</table>";	
	?>
	
	<script>
	function validateForm() {
		if(document.getElementById('idPhoto').value.length==0) {
			alert("Browse Your Picture First");
		} else {
			var s=confirm("Upload Pic??");
			if (s==true) {
				formUploadPicture.submit();
				return false;
			}
		}
	}
	</script>
</body>
</html>