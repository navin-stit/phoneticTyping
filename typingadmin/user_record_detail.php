<?php
ob_start();
session_start();
ob_end_clean();

require_once("header.php");
?>
<html>
<head>
<title>User Record Detail</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(".btnDelete").click(function() {
			
			var userno = $(this).prop('title');
			$.post("user_record_delete.php",
			{
				userno:$(this).prop('title'),
				nama:$(this).prop('alt')
			},
			function(data,status) {
				window.location.href='user_record_detail.php?id='+data;
			});
			
		});
		
		$(".cTxtKet").hide();
		$(".cTxtScore").hide();
		$(".btnUpdate").click(function() {
			var idbaris = $(this).prop('title');
			
			
			if($(this).attr("value")=="Edit") {
				$(this).val("Update");
				
				$("#txtKet"+idbaris).show();
				$("#txtLabelKet"+idbaris).hide();
				$("#txtScore"+idbaris).show();
				$("#txtLabelScore"+idbaris).hide();
			} else {
				$(this).val("Edit");
				
				$.post("user_record_update.php",
				{
					up_id:idbaris,
					up_lesson:$("#txtKet"+idbaris).val(),
					up_score:$("#txtScore"+idbaris).val()
				},
				function(data,status) {
					if(data=="Sukses") {
						$("#txtKet"+idbaris).hide();
						$("#txtLabelKet"+idbaris).show();
						$("#txtScore"+idbaris).hide();
						$("#txtLabelScore"+idbaris).show();
						
						$("#txtLabelKet"+idbaris).text($("#txtKet"+idbaris).val());
						$("#txtLabelScore"+idbaris).text($("#txtScore"+idbaris).val());
					}
				});
				
			}
			
		});
	});
</script>
</head>

<body background="image/bg.gif">
	<br/>
	<table bgcolor="white" border="1" align='center' width='750' rules='rows'>
		<?php
		require_once("koneksi.php");
		
		
		echo "<tr align='center'>";
			echo "<th colspan='4' style='padding:10px;background-color:#FFA500;color:Blue'>Student Name : ".$_GET['id']."</th>";
		echo "</tr>";
		
		echo "<tr class='judul'>";
			echo "<th width='40%'>Lesson Name</th>";
			echo "<th width='30%'>Score</th>";
			echo "<th >Delete</th>";
			echo "<th >Edit</th>";
		echo "</tr>";
		
		$tampildata = mysql_query("SELECT * FROM user_record WHERE nama='".$_GET['id']."'");
		while ($row = mysql_fetch_array($tampildata)) {
			echo "<tr align='center' class='seleksi_row' >";
			echo "<td>";
				echo "<label id='txtLabelKet".$row['no']."' class='cLabelKet' >" . $row['keterangan'] . "</label>";
				echo "<input type='text' id='txtKet".$row['no']."' class='cTxtKet' name='txtKet".$row['no']."' value='".$row['keterangan']."' />";
			echo "</td>";
			
			echo "<td>";
				echo "<label id='txtLabelScore".$row['no']."' class='cLabelScore' >" . $row['score'] . "</label>";
				echo "<input type='text' id='txtScore".$row['no']."' class='cTxtScore' name='txtScore".$row['no']."' value='".$row['score']."' />";
			echo "</td>";
			
			echo "<td><input type='button' value='Delete' style='width:100px' class='btnDelete' title='".$row['no']."' alt='".$row['nama']."' /></td>";
			echo "<td><input type='button' value='Edit' style='width:100px' class='btnUpdate' title='".$row['no']."' /></td>";
			echo "</tr>";
		}
		?>
	</table>
	
	<br/>
	<table border="0" align='center' width='750' rules='rows'>
		<tr>
			<td><input style="height:50px;" type="button" value="<< Back" onclick="window.location.href='user_record.php'" ></td>
		</tr>
	</table>
</body>

</html>