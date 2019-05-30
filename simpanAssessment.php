<?php

$nomor = 0;
$kata = "";

$myFile = "assessments.txt";
$fh = fopen($myFile, 'w') or die("can't open file");

for ($a = 0; $a < count($_POST['txtKata']); $a++ ) {
	$kata .= $_POST['txtNomor'][$a];
	$kata .= "|";
	$kata .= $_POST['txtKata'][$a];
	
	//echo $kata . "<br/>";
	if($a!==(count($_POST['txtKata'])-1)) {
		$kata .= "\n";
	}
	fwrite($fh, $kata);
	
	$kata="";
	
	
}

echo "<script>alert('Save Success!!!')</script>";
echo "<script>window.location.href='soalAssessments.php'</script>";
?>

