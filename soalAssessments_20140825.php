<html>
<head>
<title>Soal Lesson</title>
<link rel="stylesheet" type="text/css" href="typingadmin/style.css">	
</head>
<body background="typingadmin/image/bg.gif">
	
	<?php
	$file = file_get_contents('assessments.txt', true);
	$arr = explode("\n", $file);
	
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	require_once("typingadmin/tblBarisLogin.php");
	
	
	echo "<br/>";
	echo "<form action='simpanAssessment.php' method='POST'>";
		echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
			
			
		
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='2' width='100' align='center'><b>=== Edit Assessment ===</b></td>";
			echo "</tr>";
			
			
			$soal = "";
			for ($a = 0; $a < count($arr); $a++) {
				$soal = explode("|" , $arr[$a]);
				
					
				echo "<tr>";
					echo "<td align='center' width='50'><input type='hidden' name='txtNomor[]' value='".$soal[0]."'/>$soal[0]</td>";
					echo "<td><input size='80' type='text' name='txtKata[]' value='".$soal[1]."'/></td>";
				echo "</tr>";
				
				
			}
			echo "<tr>";
				echo "<td align='center' colspan='2'><input type='submit' value='SAVE' style='width:100px;height:50px;' /></td>";
			echo "</tr>";
			
		echo "</table>";
	echo "</form>";
	?>
	
</body>
</html>