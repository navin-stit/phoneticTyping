<html>
<head>
<title>Assessment Issue</title>
<link rel="stylesheet" type="text/css" href="typingadmin/style.css">	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$("#btnAddFile").click(function () {
			if (window.File && window.FileReader && window.FileList && window.Blob) {
				$("#txtFile").trigger('click');
			} else {
				alert("Please upgrade your browser");
			}
		});
		
		$("#txtFile").change(function() {
			//alert($("#txtFile").val());
			
			var ext = $("#txtFile").val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['txt']) == -1) {
				alert('Please Upload Your lessons.txt Files');
			} else {
				if($("#txtFile")[0].files[0].size > 1000000) { //1MB = 1000,000
					alert("your txt file is too big")
				} else {
				
					var data = new FormData();
					jQuery.each($('#txtFile')[0].files, function(i, file) {
						data.append('txtFile'+i, file);
					});
					
					$.ajax({
						url: 'soalAssessment_upload.php',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function(data){
							//alert(data);
							location.reload();
						}
					});
					
				}
			}
			
			
		});
	});
</script>

</head>
<body background="typingadmin/image/bg.gif">
	
	<?php
	$file = file_get_contents('assessments.txt', true);
	$arr = explode("\n", $file);
	
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	//require_once("typingadmin/tblBarisLogin.php");
	
	
	echo "<form action='simpanAssessment.php' method='POST'>";
		echo "<table border='1' align='center' rules=none frame=box bgcolor='white' width='700px'>";
			
			
		
			echo "<tr bgcolor='white' CLASS='darkrow'>";
				echo "<td colspan='2' width='100' align='center'><b> Edit Assessment </b>";
				echo "<p align='right'><input type='button' value='Download' style='width:100px;height:40px;' onclick='downloadtxt()' title='download assessment.txt files' /></p>";
			echo "</tr>";
			
			
			$soal = "";
			for ($a = 0; $a < count($arr); $a++) {
				$soal = explode("|" , $arr[$a]);
				
					
				echo "<tr>";
					echo "<td align='center' width='50'><input type='hidden' name='txtNomor[]' value='".((isset($soal[0]) && !empty($soal[0]))?$soal[0]:"")."'/>".((isset($soal[0]) && !empty($soal[0]))?$soal[0]:"")."</td>";
					echo "<td><input size='80' type='text' name='txtKata[]' value='".((isset($soal[1]) && !empty($soal[1]))?$soal[1]:"")."'/></td>";
				echo "</tr>";
				
				
			}
			echo "<tr>";
				echo "<td align='center' colspan='2'>";
					echo "<input type='submit' value='SAVE' style='width:100px;height:50px;' />";
					echo " or ";
					echo "<input type='button' id='btnAddFile' value='Upload' style='width:100px;height:50px;' />";
				echo "</td>";
			echo "</tr>";
			
		echo "</table>";
	echo "</form>";
	
	echo "<form action='upload_file.php' method='POST' enctype='multipart/form-data' id='frmPhotoUpload' name='frmPhotoUpload'>";
	echo "<input type='file' name='txtFile' id='txtFile' style='display:none' >";
	echo "<input type='submit' id='submit-btn' value='Upload' style='display:none' />";
	echo "</form>";
	?>
	
	<script>
	function downloadtxt() {
		window.location = 'download_assessments.php';
	}
	</script>
	
</body>
</html>