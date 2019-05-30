<?php
//$con = mysql_connect("69.89.31.93","shininh5_shininh5","Raisonne2012!");

//$con = mysql_connect("localhost","comicedu","Raisonnehostmonster2014!");
//mysql_select_db("comicedu_typing", $con);



//$con = mysql_connect("localhost","root","");
//mysql_select_db("typing", $con);

if($_SERVER['HTTP_HOST'] == "localhost"){
	
	$con = mysqli_connect("localhost","root","","aaaaa");
	//mysql_select_db(, $con);
	
    //localhost settings
	$dirPath 	= "typingadult";
	define('_PROFILE_IMG_BASE_PATH_', $_SERVER['DOCUMENT_ROOT'].'/typingadult/keyboard/typingadmin/images/');
	//define('_DIR_PATH_','http://localhost/vel/'.$dirPath.'/');
	define('_DIR_PATH_','http://localhost/'.$dirPath.'/');
	
}else{
	
	$con = mysql_connect("localhost","root","Zpt6vGPTgvhhOWu0cO8P");
	mysql_select_db("typing", $con);
	
	 //localhost settings
	$dirPath 	= "typingadult";
	define('_PROFILE_IMG_BASE_PATH_', $_SERVER['DOCUMENT_ROOT'].'/typingadult/keyboard/typingadmin/images/');
	define('_PROFILE_IMG_BASE_PATH_one_', '/typingadult/keyboard/images/');
	define('_DIR_PATH_','http://205.147.97.190/'.$dirPath.'/');
	
}
/*if($con) {
	echo "sukses";
} else {
	echo "gagal";
}*/
?>