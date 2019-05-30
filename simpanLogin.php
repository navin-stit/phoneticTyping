<?php
session_start();

$scriptName = $_SERVER['HTTP_REFERER'];
$PathArray = explode("/",$scriptName);

/*if($PathArray[3] == "keyboard3")
{
	require_once("typingadmin/koneksi_keyboard3.php");
}
else if($PathArray[3] == "keyboard2")
{
	require_once("typingadmin/koneksi_keyboard2.php");
}
else if($PathArray[3] == "keyboard")
{
	require_once("typingadmin/koneksi.php");
}*/

echo '<pre>';print_r($_POST);die;

require_once("typingadmin/koneksi.php");
$username = $_GET['namaUser'];
$_SESSION['username']=$username;
$sessionid=session_id();
$loadRes = mysql_query("SELECT * FROM user_session where username='".$username."'");
$row = mysql_fetch_array($loadRes);
$id = $row['userid'];
if($id>0){
	//$loadRow = mysql_fetch_array($loadRes);
	$logsession = mysql_query("UPDATE user_session SET sessionid='".$sessionid."' where username='".$username."'");
}else{
	//echo "INSERT INTO user_session (username, sessionid) VALUES ('".$username."', '".$sessionid."')";
	$logsession = mysql_query("INSERT INTO user_session (username, sessionid) VALUES ('".$username."', '".$sessionid."')");
}
$simpanlogin = mysql_query("INSERT INTO user_login (username, logindate) VALUES ('".$username."',now())");
if($simpanlogin) {
	$loadLastRecord = mysql_query("SELECT * FROM user_login ORDER BY id DESC");
	$row = mysql_fetch_array($loadLastRecord);
	$id = $row['id'];
	
	echo "idUserLogin=" . $id;
} else {
	echo "idUserLogin=none";
}

?>