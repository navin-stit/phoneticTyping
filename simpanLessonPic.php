<?php

$myFile = "imageLoad.txt";
$fh = fopen($myFile, 'w') or die("can't open file");

$kata = "";
$folder = "images/";
for ($a = 0; $a < count($_POST['txtDetail']); $a++ ) {
	$kata = $folder . $_POST['cbPhoto'][$a] . "=" . $_POST['txtDetail'][$a];
	//echo $kata . "<br/>";
	
	if ($a !== (count($_POST['txtDetail']) - 1)) {
		$kata .= "\n";
	}
	
	fwrite($fh, $kata);
}

echo "<script>alert('Save Success!!!')</script>";
echo "<script>window.location.href='EditPicture.php'</script>";
?>