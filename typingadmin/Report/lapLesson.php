<html>
<head>
<title>LESSON REPORT</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body background="../image/bg.gif">
	
	<?php
	$file = file_get_contents('../../lessons.txt', true);
	$arr = explode("\n", $file);
	
	require_once("../koneksi.php");
	require_once("../header.php");
	
	
	echo "<br/>";
	echo "<form method='POST'>";
		echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
			
			echo "<center><h1>REPORT LESSON</h1></center>";
		
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='5' width='100' align='center'><b>=== Lesson ===</b></td>";
			echo "</tr>";
			
			
			for ($a = 0; $a < count($arr); $a++) {
				
				
				// +++++++++++++++++++++++++++++++++++++++++++ SOAL LESSON +++++++++++++++++++++++++++++++++++++++++++
				if ($a < 38) {
					if($a%2==0) {
						echo "<tr>";
					} else {
						echo "<tr bgcolor='yellow'>";
					}
					
					//echo $a . "->" . $arr[$a] . "<br/>";
					
					echo "<input size='5' name='txtId[]' type='hidden' value='".$a."'/>";
					
					echo "<td>Lesson Issue ";
					if($a%2==0) {
						echo (($a/2)+1);
					} else {
						echo floor(($a/2)+1);
					}
					echo "-";
					echo (($a % 2) + 1);
					echo "</td>";
					echo "<td> : </td>";
					
					//echo "<td colspan='3'><input size='70' name='txtKata[]' size='5' type='text' value='".$arr[$a]."'</td>";
					echo "<td colspan='3'> ".$arr[$a]."</td>";
					
					echo "</tr>";
				} else {
				// +++++++++++++++++++++++++++++++++++++++++++ SOAL PILIHAN +++++++++++++++++++++++++++++++++++++++++++
					
					if ($a == 38) {
						echo "<tr bgcolor='white' CLASS='darkrow'>";
							echo "<td colspan='5' width='100' align='center'><b>=== Multiple Lesson ===</b></td>";
						echo "</tr>";
					}
					//echo "<td colspan='9'><input size='80' type='text' value='".$arr[$a]."'</td>";
					
					if ($a % 2 == 0) {
						$arKalimat = explode("|", $arr[$a]);
						echo "<tr>";
						
						echo "<td rowspan='".(count($arKalimat))."'>";
						echo "Lesson ";
						echo (($a/2)+1);
						echo "-";
						echo (($a % 2) + 1);
						echo "</td>";
						echo "<td rowspan='".(count($arKalimat))."'> : </td>";
						
							
						for ($d = 0; $d < count($arKalimat); $d++) {
							echo "<input size='5' name='txtId[]' type='hidden' value='".$a."'/>";
							if ($d == 0) {
								//echo "<td colspan='3'><input name='txtKata[]' size='70' type='text' readonly value='".$arKalimat[$d]."'</td>";
								echo "<td colspan='3'>".$arKalimat[$d]."</td>";
							} else {
								echo "<td colspan='3'>".$arKalimat[$d]."</td>";
							}
							echo "</tr>";
						}
					} else {
						$arKataDua = explode(" ",$arr[$a]);
						
						echo "<tr>";
						
						echo "<td>";
						echo "Lesson ";
						echo floor(($a/2)+1);
						echo "-";
						echo (($a % 2) + 1);
						echo "</td>";
						echo "<td> : </td>";
						
						echo "<input size='5' name='txtId[]' type='hidden' value='".$a."'/>";
						echo "<td colspan='3'>".$arr[$a]."</td>";
						
						echo "</tr>";
					}
				}
				
				
				
			}
			
		echo "</table>";
	echo "</form>";
	?>
	
</body>
</html>