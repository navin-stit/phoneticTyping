<?php
//print_r($_POST);

$myFile = "lessons.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$kata = $_POST['isilesson'];

fwrite($fh, $kata);

//$arr = explode("\n", $kata);
//str_replace("\n","\r\n",$kata);
//str_replace('<br />', PHP_EOL, $kata);
//str_replace('\n', PHP_EOL, $kata);
//str_replace('\n', "\n", $kata);

//fwrite($fh, $kata);
/*$katabaru = "";
for ($a = 0; $a < count($arr); $a++) {
	$katabaru .= $arr[$a] . '\n';
}
//$katabaru;
fwrite($fh, $katabaru);*/
?>