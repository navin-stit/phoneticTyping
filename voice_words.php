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
		
		$("#txtFile").change(function() {
			//alert($("#txtFile").val());
			
			var ext = $("#txtFile").val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['mp3','wav']) == -1) {
				alert('Please Upload Your Sound Lesson_xx.mp3 or Lesson_xx.wav Files');
			} else {
				if($("#txtFile")[0].files[0].size > 1000000) { //1MB = 1000,000
					alert("your txt file is too big")
				} else {
				
					var data = new FormData();
					jQuery.each($('#txtFile')[0].files, function(i, file) {
						data.append('txtFile'+i, file);
					});
					
					$.ajax({
						url: 'voice_words_upload.php',
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
		
		$(".btnDelete").click(function() {
			//alert($(this).attr("alt"));
			
			$.post("voice_words_delete.php",
			{
				filename:$(this).attr("alt")
			},
			function(data,status) {
				//alert(data);
				location.reload();
			});
		});
	});
</script>

</head>
<body background="typingadmin/image/bg.gif">
	
	<?php
	require_once("typingadmin/koneksi.php");
	require_once("typingadmin/header.php");
	//require_once("typingadmin/tblBarisLogin.php");
	
	
	echo "<br/>";
	echo "<form action='upload_file.php' method='POST' enctype='multipart/form-data' id='frmPhotoUpload' name='frmPhotoUpload'>";
	echo "<table border='1' align='center' rules=rows frame=box bgcolor='white' width='700px'>";
		
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<td colspan='3' align='center'>";
				echo "Upload New Sound Words<br/>";
				echo "<input type='file' name='txtFile' id='txtFile' style='display:none' >";
				echo "<input type='submit' id='submit-btn' value='Upload' style='display:none' />";
				echo "<input type='button' id='btnAddFile' value='Upload' style='width:100px;height:50px;' />";
			echo "</td>";
		echo "</tr>";
		
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<td align='center' colspan='3'>";
				echo "<font color='red' >Ps. Before upload, make sure your sound filename is <b>soundname.mp3</b><br/>sample : <b>a.mp3</b></font>";
			echo "</td>";
		echo "</tr>";
		
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<th>Words</th>";
			echo "<th>Sound MP3</th>";
			echo "<th>Delete</th>";
		echo "</tr>";
		
		
		//require_once("voice/lessons/library_sound_lesson.php");
		
		if ($handle = opendir('voice/words/')) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != ".." && $entry != "library_sound_words.php" && $entry != "library_sound_words_20140826.txt") {
					//echo $entry;
					echo "<tr align='center'>";
						echo "<td>".str_replace("_", "", substr($entry, 0, strpos($entry, ".")))."</td>";
						echo "<td>".$entry."</td>";
						echo "<td><input type='button' value='delete' class='btnDelete' alt='".$entry."' /></td>";
					echo "</tr>";
				}
			}
			closedir($handle);
		}
		
	echo "</table>";
	echo "</form>";
	?>
	
	
</body>
</html>