<?php
ob_start();
session_start();
ob_end_clean();

require_once("header.php");
?>
<html>
<head>
<title>User Record</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body background="image/bg.gif">
	<br/>
	<table bgcolor="white" border="1" align='center' width='850' rules='rows'>
		<?php
		require_once("koneksi.php");
		
		echo "<tr class='judul' style='height:50px;'>";
			echo "<th>Id</th>";
			echo "<th>Student Name</th>";
			echo "<th>Email</th>";
			echo "<th>Created On</th>";
			echo "<th>Expired On</th>";
			echo "<th>Status</th>";
			echo "<th>Detail</th>";
			echo "<th>Record Count</th>";
		echo "</tr>";
		
		$tampildata = mysql_query("SELECT a.*, COUNT(b.id) as jmlrecord
FROM user_allow a
LEFT JOIN user_record b
ON a.username=b.nama
GROUP BY a.username ORDER BY a.date_create desc");
		$no = 1;
		while ($row = mysql_fetch_array($tampildata)) {
			  $dateString = $row['date_create'];
			  $t = strtotime($dateString);
			  $t2 = strtotime('+ 1 year', $t);
			echo "<tr align='center' class='seleksi_row'>";
			echo "<td width='50'>".$no."<input type='hidden' name='txtId' id='txtId' value='".$row['id']."' /></td>";
			echo "<td width='200'>".$row['username']."</td>";
			if($row['email']){
			echo "<td width='200'>".$row['email']."</td>";
			}else{
			echo "<td width='200'>Not Available</td>";
			}
			echo "<td width='200'>".date('Y-m-d h:i:s',strtotime($row['date_create']))."</td>";
			//echo "<td width='200'>".date('Y-m-d',$t2)."</td>";
			echo "<td width='200'>".$row['expiry_date']."</td>";
			echo "<td>". kata_status($row['status'])."</td>";
			echo "<td><a href='user_record_detail.php?id=".$row['username']."' />User Record</a></td>";
			echo "<td><a href='user_record_detail.php?id=".$row['username']."' />".$row['jmlrecord']."</a></td>";
			echo "</tr>";
			$no++;
		}
		
		function kata_status($nomor) {
			$kata = "";
			if ($nomor == 0) {
				$kata = "Non-Active";
			} else {
				$kata = "Active";
			}
			return $kata;
		}
		?>
	</table>
</body>

</html>