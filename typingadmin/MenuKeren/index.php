<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title></title>
<meta http-equiv="content-type" content="text/html" />
<!-- Begin Vista-Buttons.com HEAD SECTION id=vbUL_3fd4a-->
<link href="index-files/styles_3fd4a.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">A#vbUL_3fd4aa{display:none}</style>
<!-- End Vista-Buttons.com HEAD SECTION -->
</head>
<body>
<!-- Begin Vista-Buttons.com BODY SECTION id=vbUL_3fd4a-->

<table border='0' id="vista-buttons_com_id3fd4a" width="0" cellpadding="0" cellspacing="0" border="0" class="shadow_table">
	
	<tr><td style="padding-bottom:0px" title ="Login">
	<a onclick='xpe("3fd4ao");xpshow("3fd4a",1,this);xpsmover(this);clickKeterangan(this)' id="login" onmouseout='xpsmout(this);'><img id="xpi_3fd4a" src="index-files/bt3fd4a_0.png" name="vb3fd4a" width="204" height="60" border="0" alt="Login" /></a><div>
	<ul id="vbUL_3fd4a" class="vbUL3fd4a">
		<li style='padding:10px;'><a href="changePass.php" title="Change Password">Change&nbsp;Password</a></li>
		<li style='padding:10px;'><a href="signout.php" title="Signout">Signout</a></li>
	</ul></div>
	</td>
	
	<td width="100" rowspan="5">
		&nbsp;
	</td>
	
	<td valign="top" rowspan="5">
		<img src="image/topInfo.jpg" width="420" height="30" /><br/> 
		<textarea name="txtKeterangan" id="txtKeterangan" rows="9" cols="45" readonly /></textarea>
	</td>
	</tr>
		
		
	<tr><td style="padding-bottom:0px" title ="Data Master">
	<a onclick='xpe("rfd4ao");xpshow("rfd4a",1,this);xpsmover(this);clickKeterangan(this)' id="master" onmouseout='xpsmout(this);'><img id="xpi_rfd4a" src="index-files/btrfd4a_0.png" name="vbrfd4a" width="204" height="60" border="0" alt="Data Master" /></a><div>
	<ul id="vbUL_rfd4a" class="vbUL3fd4a">
		<li style='padding:10px;'><a href="add_user.php" title="Add And Manage User">Add More User</a></li>
		<li style='padding:10px;'><a href="user_record.php" title="User Record">User Record Management</a></li>
		
		</ul></div>
	</td></tr>
	
	
	<tr><td style="padding-bottom:0px" title ="Report">
	<a onclick='xpe("2fd4ao");xpshow("2fd4a",1,this);xpsmover(this);clickLaporan(this)' id="laporanpsb" onmouseout='xpsmout(this);'><img id="xpi_2fd4a" src="index-files/bt6fd4a_0.png" name="vb2fd4a" width="204" height="60" border="0" alt="Laporan" /></a><div>
	<ul id="vbUL_2fd4a" class="vbUL3fd4a">
		<!--<li style='padding:10px;'><a href="Report/lapLesson.php" title="Report Lesson">Report Lesson</a></li>
		<li style='padding:10px;'><a href="Report/lapAssessments.php" title="Report Assessment">Report Assessments</a></li>-->
		<li style='padding:10px;'><a href="uploadPicture.php" title="Picture Management">Upload New Picture Lesson</a></li>
		<li style='padding:10px;'><a href="../EditPicture.php" title="Edit Picture">Setting Picture Lesson</a></li>
		<li style='padding:10px;'><a href="../soalLesson.php" title="Lessons Issue">Upload Lesson</a></li>
		<li style='padding:10px;'><a href="../soalLessonMode.php" title="Lesson Mode">Upload Lesson Mode</a></li>
		<li style='padding:10px;'><a href="../soalAssessments.php" title="Assessment Issue">Upload Assessments</a></li>
		<li style='padding:10px;'><a href="../voice_lesson.php" title="Voice Lesson">Upload Voice Lesson</a></li>
		<li style='padding:10px;'><a href="../voice_letters.php" title="Voice Leters">Upload Voice Leters</a></li>
		<li style='padding:10px;'><a href="../voice_words.php" title="Voice Words">Upload Voice Words</a></li>
		
	</ul></div>
	</td></tr>
	
	<tr><td style="padding-bottom:0px" title ="Report">
	<a onclick='xpe("2fd4ao");xpshow("2fd4a",1,this);xpsmover(this);clickLaporan(this)' id="laporanpsb" onmouseout='xpsmout(this);'><img id="xpi_2fd4a" src="index-files/bt2fd4a_0.png" name="vb2fd4a" width="204" height="60" border="0" alt="Laporan" /></a><div>
	<ul id="vbUL_2fd4a" class="vbUL3fd4a">
		<li style='padding:10px;'><a href="report_lesson.php" title="Report Student lesson">Report Student Lesson</a></li>
		
	</ul></div>
	</td></tr>
	
	
</table>

<br/><br/><br/>

<script type="text/javascript"> var vbImgPath="index-files/"</script>
<script type="text/javascript" src="index-files/sc3fd4a.js"></script>
<a id="vbUL_3fd4aa" href="http://vista-buttons.com">Button Maker Web Page Buttons by Vista-Buttons.com v5.5</a>
<!-- End Vista-Buttons.com BODY SECTION -->


	<script>
		var statInfo = "kosong";
		if(statInfo=="kosong") {
			document.getElementById('txtKeterangan').value="";
			document.getElementById('txtKeterangan').value+="Info Admin Typing CMS\r-----------------------------------------------";
			document.getElementById('txtKeterangan').value+="Please Use it Carefully \r\n\r\n";
		}
		
			
		function clickKeterangan(nama) {
			
			if(nama.id=="login") {
				if (statInfo != "login") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="LOGIN\r-----------------------------------------------"
					document.getElementById('txtKeterangan').value+="\nChange Pass"
					document.getElementById('txtKeterangan').value+="\nTo change user password \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nSignout"
					document.getElementById('txtKeterangan').value+="\nQuit from Program \n-----------------------------------------------";
					
					statInfo="login";
					
				}
			} else if (nama.id=="master") {
				if (statInfo != "master") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="DATA MASTER\r---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nUpload New Picture"
					document.getElementById('txtKeterangan').value+="\nWant to Insert New Picture, use this menu \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nEdit Picture Lesson"
					document.getElementById('txtKeterangan').value+="\nEdit Picture Position for every lesson \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nLesson"
					document.getElementById('txtKeterangan').value+="\nEdit Lesson \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nAssessments"
					document.getElementById('txtKeterangan').value+="\nEdit Assessments \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nPlayer Data"
					document.getElementById('txtKeterangan').value+="\nManipulate User Data \n---------------------------------------------";
					statInfo = "master"
				}
			} 
			
		}
		
		function clickLaporan(nama) {
			if (nama.id="laporanpsb") {
				if (statInfo != "report") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="Report\r---------------------------------------------"
					document.getElementById('txtKeterangan').value+="\nReport Lesson"
					document.getElementById('txtKeterangan').value+="\nShow Report Soal Lesson \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nReport Assessments"
					document.getElementById('txtKeterangan').value+="\nShow Report Soal Assessments \n---------------------------------------------";
					
					statInfo = "report";
				}
			}
		}
		
	</script>
	
</body>
</html>