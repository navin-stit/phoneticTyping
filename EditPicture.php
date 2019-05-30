<html>
<head>
<title>Edit Picture Lesson</title>
<link rel="stylesheet" type="text/css" href="typingadmin/style.css">	
</head>
<body background="typingadmin/image/bg.gif">
	<?php
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	//require_once("typingadmin/tblBarisLogin.php");
	
	$file = file_get_contents('imageLoad.txt', true);
	$arr = explode("\n", $file);
	
	$gambar = "";
	$detailGambar = "";
	$folderPhoto = "images/";
	
	echo "<br/>";
	$cariGambar = mysql_query("SELECT * FROM ms_picture");
	echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
		echo "<tr>";
		while ($row = mysql_fetch_array($cariGambar)) {
			echo "<td align='center'><img height='100' width='100' src='".$folderPhoto . $row['name_photo']."'/>
			<br/>".$row['name_photo']."</td>";
		}
		echo "</tr>";
	echo "</table>";
	echo "<br/>";
	
	echo "<form name='formEditPic' action='simpanLessonPic.php' Method='POST'>";
	echo "<center><input value=' Save ' type='submit' style='width:100px;height:50px;' /></center>";
		
	echo "<table width='400' border='1' align='center' rules=all frame=box bgcolor='white'>";	
	
	
	echo "<tr bgcolor='white' CLASS='darkrow'>";
		echo "<th>Photo</th>";
		echo "<th>Lesson Number</th>";
		echo "<th>Change To</th>";
	echo "</tr>";
	
	
		for ($a = 0; $a < count($arr); $a++) {
			$gambar = explode("\n" , $arr[$a]);
			
			$detailGambar = explode("=" , $gambar[0]);
			//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";
			
			echo "<tr align='center'>";
				echo "<td><img width='50' height='50' src='".$detailGambar[0]."'/></td>";
				echo "<td>".$detailGambar[1]."</td>";
				echo "<input name='txtDetail[]' type='hidden' value='".$detailGambar[1]."'/>";
				
				$namaGbr = substr($detailGambar[0], 7, 6);
				//echo $namaGbr . "<br/>";
				$cariDataGambar = mysql_query("SELECT * FROM ms_picture");
				echo "<td>";
				echo "<select name='cbPhoto[]'>";
				while ($row = mysql_fetch_array($cariDataGambar)) {
					if($namaGbr==$row['name_photo']) {
						echo "<option selected style='width:80' value='".$row['name_photo']."'>".$row['name_photo']."</option>";	
					} else {
						echo "<option style='width:80' value='".$row['name_photo']."'>".$row['name_photo']."</option>";
					}
				}
				echo "</select>";
				echo "</td>";
				
			echo "</tr>";
		}
	echo "</table>";	
	
	echo "</form>";
	?>
</body>
</html>