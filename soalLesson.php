<html>
<head>
<title>Lessons Issue</title>
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
		
		$("#btnUpdate").click(function() {
			//alert($("#txtIsiLesson").val());
			$.post("soalLesson_update.php",
			{
				isilesson:$("#txtIsiLesson").val()
			},
			function(data,status) {
				location.reload();
				alert("Data lesson has been updated");
				//alert(data);
			});
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
						url: 'soalLesson_upload.php',
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
	$file = file_get_contents('lessons.txt', true);
	$arr = explode("\n", $file);
	
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	//require_once("typingadmin/tblBarisLogin.php");
	
	
	echo "<br/>";
	echo "<form action='upload_file.php' method='POST' enctype='multipart/form-data' id='frmPhotoUpload' name='frmPhotoUpload'>";
	echo "<table border='1' align='center' rules=rows frame=box bgcolor='white' width='700px'>";
		
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<td align='center'>";
				echo "Upload and Download Lesson";
			echo "</td>";
		echo "</tr>";
		
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<td align='center'>";
				echo "<input type='file' name='txtFile' id='txtFile' style='display:none' >";
				echo "<input type='submit' id='submit-btn' value='Upload' style='display:none' />";
				echo "<input type='button' id='btnAddFile' value='Upload' style='width:100px;height:50px;' />";
				
				echo "<input type='button' value='Download' style='width:100px;height:50px;' onclick='downloadtxt()' />";
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>
			<td>";
				echo "<input type='button' id='btnUpdate' value='Update lesson' />";
				echo "<textarea id='txtIsiLesson' style='width:100%;height:400px;resize: none;' wrap='off' >";
			
			for ($a = 0; $a < count($arr)-1; $a++) {
				echo $arr[$a] . "\n";
			}
			
			echo "</textarea></td>
		</tr>";
		
	echo "</table>";
	echo "</form>";
	?>
	
	<script>
	function downloadtxt() {
		window.location = 'download_lessons.php';
	}
	</script>
	
</body>
</html>