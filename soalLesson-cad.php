<html>
<head>
	<title>New News</title>
	<STYLE TYPE="text/css">
	.darkrow, .darkrow TD, .darkrow TH
	{
	background-color:blue;
	color:white;
	}
	</STYLE>
</head>
<body background="typingadmin/image/bg.gif">
	
	<?php
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	require_once("typingadmin/tblBarisLogin.php");
	
	$file = file_get_contents('lessons.txt', true);
	$arr = explode("\n",$file);
	echo "<br/>";
	echo "<form action='simpanLesson.php' method='POST'>";
		echo "<table border='1' align='center' rules=rows frame=box bgcolor='white'>";
			
			echo "<center><input type='submit' value='simpan'/></center>";
		
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='15' width='100' align='center'><b>=== Soal Lesson ===</b></td>";
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
					$arKata = explode(" ",$arr[$a]);
					
					echo "<td><input size='5' name='txtId[]' type='text' value='".$a."'/></td>";
					
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
					
					for ($b=0; $b < count($arKata); $b++) {
						echo "<td><input name='txtKata[]' size='5' type='text' value='".$arKata[$b]."'</td>";
					}
					echo "</tr>";
				} else {
				// +++++++++++++++++++++++++++++++++++++++++++ SOAL PILIHAN +++++++++++++++++++++++++++++++++++++++++++
					
					if ($a == 38) {
						echo "<tr bgcolor='white' CLASS='darkrow'>";
							echo "<td colspan='15' width='100' align='center'><b>=== Soal Pilihan ===</b></td>";
						echo "</tr>";
					}
					//echo "<td colspan='9'><input size='80' type='text' value='".$arr[$a]."'</td>";
					
					if ($a % 2 == 0) {
						$arKalimat = explode("|", $arr[$a]);
						echo "<tr>";
						
						echo "<td rowspan='".(count($arKalimat)-1)."'>";
						echo "Lesson ";
						echo (($a/2)+1);
						echo "-";
						echo (($a % 2) + 1);
						echo "</td>";
							
						for ($d = 1; $d < count($arKalimat); $d++) {
							//echo "<td><input type='text' value='".$arKalimat[$d]."'</td>";
							$arKata = explode(",", $arKalimat[$d]);
							for ($e = 0; $e < count($arKata); $e++) {
								echo "<td><input size='5' name='txtId[]' type='text' value='".$a."'/></td>";
								if ($e == 0) {
									echo "<td>".$arKata[$e]."</td>";
								} else {
									echo "<td><input name='txtKata[]' size='5' type='text' value='".$arKata[$e]."'</td>";
								}
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
						
						echo "<td align='center'><b> : </b></td>";
						
						for ($f = 1; $f < count($arKataDua); $f++) {
							echo "<td><input size='5' name='txtId[]' type='text' value='".$a."'/></td>";
							echo "<td><input size='5' name='txtKata[]' type='text' value='".$arKataDua[$f]."'/></td>";
						}
						echo "</tr>";
					}
				}
				
				
				
			}
			
		echo "</table>";
	echo "</form>";
	?>
	
</body>
</html>