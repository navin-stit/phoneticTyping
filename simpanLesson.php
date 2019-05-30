<?php

$nomor = 0;
$kata = "";
$beda = false;

$myFile = "lessons.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$isiString = "";

for ($a = 0; $a < count($_POST['txtKata']); $a++ ) {
	if($a<38) {
		echo $_POST['txtKata'][$a];
		echo "<br/>";
		
		$_POST['txtKata'][$a] .= "\n";
		fwrite($fh, $_POST['txtKata'][$a]);
	} else {
		
		$kata .= $_POST['txtKata'][$a] . "|";
		
		if ($_POST['txtId'][$a] != $_POST['txtId'][$a + 1]) {
			$kata = substr($kata,0,(strlen($kata)-1));
			echo $kata . "<br/>";	
			
			if($a!==(count($_POST['txtKata'])-1)) {
				$kata .= "\n";
			}
			fwrite($fh, $kata);
			
			$kata="";
		}
		
	}
	
}

echo "<script>alert('Save Success!!!')</script>";
echo "<script>window.location.href='soalLesson.php'</script>";
?>

