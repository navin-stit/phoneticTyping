<?php
require_once("typingadmin/koneksi.php");

$message="";
$message = str_replace( "%0D", "\n", $_POST['isi']);

/*
echo "Name : " . $_POST['nama'] . "<br/>";
echo "Score : " . $_POST['isi'] . "<br/>";
echo "Email Tujuan : " . $_POST['email'] . "<br/>";
*/

$to = $_POST['email'];
$subject = "TigerPaws Phoenetic Typing Results : " . $_POST['nama'];

$body = "The user named : " . $_POST['nama'] . "\n";
$body .= "on the TigerPaws Phonetic Typing Program\n";
$body .= "completed the following lessons : \n";
$body .= $_POST['isi'] . "\n";
$body .= "On : ".date("d/m/Y")." \n";
$body .= "\n\n\n";
$body .= "-------------------------------------------\n";
$body .= "Mail sent by the TigerPaws Phonetic Typing Program.  The sender of this e-mail cannot be reached by replying to this message.\n";

//$headers = "http://www.comicedu.com/typing/";
$headers = "http://phonetictyping.com/keyboard/";

$kirimEmail = mail($to, $subject, $body, $headers);

if ($kirimEmail) {
	echo "Your mail has been sent to \n" . $_POST['email'];
} else {
	echo "Failed Send mail";
}

?>