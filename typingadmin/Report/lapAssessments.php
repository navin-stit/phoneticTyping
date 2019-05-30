<html>
<head>
<title>ASSESSMENT REPORT</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body background="../image/bg.gif">
	
	<?php
	$file = file_get_contents('../../assessments.txt', true);
	$arr = explode("\n", $file);
	
	require_once("../koneksi.php");
	require_once("../header.php");
	require_once("../tblBarisLogin.php");
	
	
	echo "<br/>";
	echo "<form action='simpanAssessment.php' method='POST'>";
		echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
			
			
		
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='2' width='100' align='center'><h1>=== REPORT ASSESSMENT ===</h1></td>";
			echo "</tr>";
			
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='2'><b><hr/></b></td>";
			echo "</tr>";
			
			$soal = "";
			for ($a = 0; $a < count($arr); $a++) {
				$soal = explode("|" , $arr[$a]);
				
					
				echo "<tr>";
					echo "<td align='center' width='50'><input type='hidden' name='txtNomor[]' value='".$soal[0]."'/>$soal[0]</td>";
					//echo "<td><input size='80' type='text' name='txtKata[]' value='".$soal[1]."'/></td>";
					echo "<td width='500'>".$soal[1]."</td>";
				echo "</tr>";
				
				
			}
			echo "<tr>";
				//echo "<td align='center' colspan='2'><input type='submit' value='simpan'/></td>";
			echo "</tr>";
			
		echo "</table>";
	echo "</form>";
	?>
	
</body>
</html>