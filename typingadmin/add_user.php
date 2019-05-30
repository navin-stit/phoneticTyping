<?php
ob_start();
session_start();
ob_end_clean();

require_once("header.php");
?>
<head>
<title>Add User</title>
<link rel="stylesheet" type="text/css" href="style.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(".txtStatus").change(function() {
		
			var userid = $(this).prop('title');
			var statusChange = $(this).find('option:selected').attr("value");
			
			$.post("add_user_update.php",
			{
				userid:$(this).prop('title'),
				statusChange:$(this).find('option:selected').attr("value")
			},
			function(data,status) {
				//alert(data);
				if(data=="Err") {
					alert("Error");
				}
			});
			//return false;
			
		});
		
		$(".hapus_data").click(function() {
			$.post("add_user_delete.php",
			{
				iduser:$(this).attr("alt")
			},
			function(data,status) {
				//alert(data);
				if(data=="Err") {
					alert("Error");
				} else {
					location.reload();
				}
			});
		});
	});
</script>
</head>

<body background="image/bg.gif">
	<br/>
	<table bgcolor="white" border="3" align='center' width='750' rules='none' >
		<form action="add_user_save.php" method="POST">
		<tr>
			<td align="right">New user (Student) </td>
			<td><input name="txtNewUser" type="text" maxlength="20" required /></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Save" style="width:100px;height:50px;" /></td>
		</tr>
		</form>
	</table>
	
	<br/><br/>
	
	<table bgcolor="white" border="1" align='center' width='700' rules='none' >
		<form action="updatePass.php" method="POST">
			
		<tr class="judul">
			<td align="center" colspan="5">USER LIST</td>
		</tr>
		
		<?php
		require_once("koneksi.php");
		
		echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>Student Name</th>";
			echo "<th>Account Create</th>";
			echo "<th>Status</th>";
			echo "<th>Delete</th>";
		echo "</tr>";
		
		$nomor = 1;
		$tampildata = mysql_query("SELECT * FROM user_allow");
		while ($row = mysql_fetch_array($tampildata)) {
			echo "<tr align='center' class='seleksi_row'>";
			echo "<td width='50'>".$nomor."<input type='hidden' name='txtId' id='txtId' value='".$row['id']."' /></td>";
			echo "<td width='200'>".$row['username']."</td>";
			echo "<td>".$row['date_create']."</td>";
			echo "<td>";
				//echo $row['status'];
				echo "<select name='txtStatus' class='txtStatus' title='".$row['id']."' width='100%'>";
				if ($row['status'] == 1) {
					echo "<option value='1' selected >Active</option>";
					echo "<option value='0'>Non-Active</option>";
				} else {
					echo "<option value='1' >Active</option>";
					echo "<option value='0' selected >Non-Active</option>";
				}
				echo "</select>";
			echo "</td>";
			echo "<td><input type='button' value='Delete' class='hapus_data' alt='".$row['id']."' ></td>";
			echo "</tr>";
			$nomor++;
		}
		
		
		?>
		</form>
	</table>
	
	<br/>
	<center>
		<a href="index.php">HOME</a>
	</center>
</body>