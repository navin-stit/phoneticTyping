<html>
<head>
<title>Lessons</title>
<link rel="stylesheet" type="text/css" href="typingadmin/style.css">	
</head>
<body background="typingadmin/image/bg.gif">
	
	<?php
	$file = file_get_contents('lessons.txt', true);
	$arr = explode("\n", $file);
	
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	require_once("typingadmin/tblBarisLogin.php");
	
	
	echo "<br/>";
	echo "<form action='simpanLesson.php' method='POST'>";
		echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
			
			echo "<center><input type='submit' value='SAVE' style='width:100px;height:50px;' /></center>";
		
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='5' width='100' align='center'><b>=== Lessons ===</b></td>";
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
					
					echo "<td>Soal Lesson ";
					if($a%2==0) {
						echo (($a/2)+1);
					} else {
						echo floor(($a/2)+1);
					}
					echo "-";
					echo (($a % 2) + 1);
					echo "</td>";
					echo "<td> : </td>";
					
					echo "<td colspan='3'><input size='70' name='txtKata[]' size='5' type='text' value='".$arr[$a]."'/></td>";
					
					echo "</tr>";
				} else {
				// +++++++++++++++++++++++++++++++++++++++++++ SOAL PILIHAN +++++++++++++++++++++++++++++++++++++++++++
					
					if ($a == 38) {
						echo "<tr bgcolor='white' CLASS='darkrow'>";
							echo "<td colspan='5' width='100' align='center'><b>=== Multiple Issue ===</b></td>";
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
								echo "<td colspan='3'><input name='txtKata[]' size='70' type='text' readonly value='".$arKalimat[$d]."'/></td>";
							} else {
								echo "<td colspan='3'><input title='use comma (,) to separate each word' name='txtKata[]' size='70' type='text' value='".$arKalimat[$d]."'/></td>";
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
						echo "<td colspan='3'><input size='70' name='txtKata[]' type='text' value='".$arr[$a]."'/></td>";
						
						echo "</tr>";
					}
				}
				
				
				
			}
			
		echo "</table>";
	echo "</form>";
	?>
	
</body>
</html>