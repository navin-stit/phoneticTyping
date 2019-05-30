<?php

$nomor = 0;
$kata = "";
$beda = false;
for ($a = 0; $a < count($_POST['txtKata']); $a++ ) {
	if($a<38) {
		echo $_POST['txtKata'][$a];
		echo "<br/>";
	} else {
		
		$kata .= $_POST['txtKata'][$a] . "|";
		
		if ($_POST['txtId'][$a] != $_POST['txtId'][$a + 1]) {
			$kata = substr($kata,0,(strlen($kata)-1));
			echo $kata . "<br/>";	
			$kata="";
		}
		
	}
	
}

?>