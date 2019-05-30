<?php 
session_start();
require_once("../typingadmin/koneksi.php");

if(empty($_SESSION['username'])){
	$url = _DIR_PATH_."keyboard";
	header("Location: ".$url);exit();
}

$username = (isset($_SESSION['username']) && !empty($_SESSION['username']))?$_SESSION['username']:"";
//print_r($username);exit;
$currDate = date('Y-m-d');
//print_r($currDate);exit;
$currShowDate = date('d-M-Y');
$html='';


//get last lesson record
//$getUserRecordData1 = "SELECT * FROM user_record WHERE nama='".$username."' AND recorddate!=CURDATE() ORDER BY no DESC LIMIT 1";
$getUserRecordData1 = "SELECT * FROM user_record WHERE nama='".$username."' ORDER BY no DESC LIMIT 1";
$getUserData1 = mysqli_query($con,$getUserRecordData1);

if(mysqli_num_rows($getUserData1)>0){
	while ($row1 = mysqli_fetch_array($getUserData1,MYSQLI_BOTH)) {
		//print_r($row1);exit;
		$html.='<div class="recod-value"><div class="recod">Last Lesson Record ( '.date('d-M-Y', strtotime($row1['recorddate'])).' )</div>';
		$html.='<div class="score">'.$row1['keterangan'].' Score : '.$row1['score'].'</div>';
		$html.='</div>';
	}
}

//get today lesson record 
/*$getUserRecordData = "SELECT * FROM user_record WHERE nama='".$username."' AND recorddate=CURDATE()";
$getUserData = mysql_query($getUserRecordData);

if(mysql_num_rows($getUserData)>0){
	$html.='<div class="recod-value"><div class="recod">Today Lesson Record ( '.$currShowDate.' )</div>';
	while ($row = mysql_fetch_array($getUserData)) {
		$html.='<div class="score">'.$row['keterangan'].' Score : '.$row['score'].'</div>';
	}
	$html.='</div>';
}*/
//echo $html;die;


$divShow = "false";

if(isset($_POST) && !empty($_POST)){
	//echo '<pre>';print_r($_POST);die;
	
	$to = $_POST['demail'];
	$subject = "TigerPaws Phoenetic Typing Results : " . $username;

	$body = "The user named : " . $username . "\n";
	$body .= "on the TigerPaws Phonetic Typing Program\n";
	$body .= "completed the following lessons : \n";
	$body .= $html . "\n";
	$body .= "On : ".date("d/m/Y")." \n";
	$body .= "\n\n\n";
	$body .= "-------------------------------------------\n";
	$body .= "Mail sent by the TigerPaws Phonetic Typing Program.  The sender of this e-mail cannot be reached by replying to this message.\n";
	
	//echo '<pre>';print_r($body);die;
	
	//$headers = "http://www.comicedu.com/typing/";
	//$headers = "http://phonetictyping.com/keyboard/";
	
	$headers  = "From: msateaches <  >\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
	
	$kirimEmail = mail($to, $subject, $body, $headers);

	if ($kirimEmail) {
		//echo "Your mail has been sent to \n" . $_POST['email'];
	} else {
		//echo "Failed Send mail";
	}
	$divShow = "true";
	session_destroy();
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PhoneTic Typing</title>
	<link href="docs/css/jquery-ui.min.css" rel="stylesheet">	
	<!-- keyboard widget css & script (required) -->
	<link href="css/keyboard.css" rel="stylesheet">
	

	<script src="docs/js/jquery-latest.min.js"></script>
	<script src="docs/js/jquery-ui.min.js"></script>
	
	<!-- demo only -->
	<link rel="stylesheet" href="docs/css/bootstrap.min.css">
	<link rel="stylesheet" href="docs/css/font-awesome.min.css">
	<link href="docs/css/demo.css" rel="stylesheet">
	
</head>
<body class="custombackground">

<div id="page-wrap">
<div class="datacontainer">
<div class="row">
<div class="col-xs-12 col-sm-7 col-md-7 pdleft">
	<div class="headingarea" style="display:<?php echo (isset($divShow) && $divShow=="true")?"none":"block";?>">
		<h1>Lesson Results</h1>
	</div>
</div>
<div class="col-xs-12 col-sm-5 col-md-5 pdright">
	<div class="headingarea" style="display:<?php echo (isset($divShow) && $divShow=="true")?"none":"block";?>">
		<h2>Logged in as : <span><?php echo $username;?></span></h2>
		<h3>Thursday August 16 2018</h3>
	</div>
</div>	
</div>	
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 nopadding text-center">
<div class="datacontent"><?php echo (isset($divShow) && $divShow=="true")?"Lesson Summary Sent.":"Lesson Completed:";?></div>
</div>
</div>
<div class="record-sec">
<div class="headingarea">
<?php if(isset($divShow) && $divShow=="false"){?>
<div class="record-val">
	<div class="username">Username: <?php echo $username;?></div>	
	<?php echo $html;?>
</div>
<?php } else { ?>
<div class="record-val">
	<p style="text-align:center;">Your mail has been sent to<br> 
	<?php echo (isset($_POST['demail']) && !empty($_POST['demail']))?$_POST['demail']:"";?></p>
</div>
<?php } ?>
</div>
</div>
<div class="record-sec-blow">
<div class="row">
<form id="sendEmail" method="post" action="" autocomplete="off">
<div class="col-xs-12 col-sm-7 col-md-7" style="display:<?php echo (isset($divShow) && $divShow=="true")?"none":"block";?>">
	<div class="headingarea">
		<div>Destination E-mail:</div>
		<input class="typ-text" name="demail" type="text" />
	</div>
</div>


<div class="col-xs-12 col-sm-5 col-md-5" style="display:<?php echo (isset($divShow) && $divShow=="true")?"none":"block";?>">
	<div class="headingarea">
		<input class="emil-btn" type="submit"  id='btnValidate' value="Click to E-mail results" />
	</div>
</div>	
<div class="col-xs-12 col-sm-12 col-md-12 text-center retun-sec">
<a class="headingarea" href="../prottotype.php">Return to Lesson Menu</a>
</div>
</form>
</div>
</div>
</div>
</div>
</body></html>
<script>
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
$(document).ready(function(e) {
	$('input#btnValidate').click(function() {
		var email = $("input[name='demail']").val();
		var filter = "/^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/";
		
		$(".error").remove();
		
		if(email==''){
			$("input.typ-text").after("<p class='error' style='color:red'>Please enter email</p>");
			return false;
		}
		
		if(isValidEmailAddress(email)){
			return true;
		}else{
			$("input.typ-text").after("<p class='error' style='color:red'>Please enter valid email</p>");
			return false;
		}
		return false;
	});
});
</script>