<head>
	<!-- Deluxe Menu -->
    <noscript><p><a href="http://deluxe-menu.com">Javascript Menu by Deluxe-Menu.com</a></p></noscript>
    <script type="text/javascript" src="data.files/dmenu.js"></script>
    <!-- (c) 2009, by Deluxe-Menu.com -->
		
<title>ADMIN TYPING</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="stlib.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
	<STYLE TYPE="text/css">
	.darkrow, .darkrow TD, .darkrow TH
	{
	background-color:blue;
	color:white;
	}
	</STYLE>
</head>

<body background="image/bg.gif">

<?php

	require_once("header.php");
	require_once("koneksi.php");
	
	if(isset($_POST['username'])) {
		$_SESSION['namaUser'] = $_POST['username'];
		$_SESSION['pass'] = $_POST['password'];
	}
	
	echo "<table border='0' RULES=rows FRAME=BOX bgcolor='white' align='center' width='700' height='300'>";
		if(isset($_SESSION['namaUser'])) {
			echo "<tr><td align='center'>";
			$cekLogin = mysqli_query($con,"SELECT * FROM user WHERE namaLogin='".$_SESSION['namaUser']."' && password='".$_SESSION['pass']."' && verifikasi='true'");
			$jumlahData = mysqli_num_rows($cekLogin);
			
			if ($jumlahData > 0) {
				//Login Sukses
				
				echo "<tr><td height='1' colspan='3' align='right' bgcolor='yellow'><font size='2'><b>Login as : ". $_SESSION['namaUser'] ."</b></font></td></tr>";
				//echo "<tr align='center'><td width='500' valign='top' bgcolor='orange'>";
				
				while ($row = mysql_fetch_array($cekLogin)) {
					//echo "pangkat : " . $row[pangkat];
					$pangkat = $row['pangkat'];
					$jabatan = $row['jabatan'];
					$_SESSION['pangkat'] = $row['pangkat'];
					$_SESSION['jabatan'] = $row['jabatan'];
				}
				
				if ($pangkat == 9) {
					$kataJabatan = "Admin";
				} else if ($pangkat == 2) {
					$kataJabatan = "User";
				} else if ($pangkat == 1) {
					$kataJabatan = "User";
				}
				
				//echo "<font color='blue'><b>=== Active " . $jabatan . " ===</b></font>";
				//echo "</tr>";
				echo "<tr><td>";
				//echo "<hr/>";
				//Memunculkan Menu berdasarkan pangkat
				if ($pangkat == 9) {
					//echo MenuAdmin();
					include ("MenuKeren/index.php");
				} else if ($pangkat == 2) {
					//echo MenuAdmin();
					include ("MenuKeren/index.php");
				} else if ($pangkat == 1) {
					if($jabatan=="marketing") {
						include ("MenuKeren/MenuUser.php");
					} else if ($jabatan=="administrasi") {
						include ("MenuKeren/MenuUser.php");
					} else if ($jabatan == "keuangan") {
						include ("MenuKeren/MenuUser.php");
					}
				}
				echo "<hr/>";
				echo "</td></tr>";
				
				
			} else {
				echo "<tr><td height='1' colspan='4' align='right'><font size='2' color='red'><b>Nama Login atau Password salah!!!</b></font></td></tr>";
				echo "<tr align='center'>";
				echo "<td align='center' width='700' valign='top'>";
				include('login.php');
				
			}
		} else {
			//echo "<tr><td height='1' colspan='4' align='right' bgcolor='white'><font size='2'><b>Login as : Guest</b></font></td></tr>";
			echo "<tr align='center'>";
			echo "<td align='center' width='700' valign='top'>";
			include('login.php');
		}
		
		echo "</td>";
		echo "<td>";
			if(isset($_GET['halaman'])) {
				if($_GET['halaman']==awal) {
					include "manual.html";
				}
			}
		echo "</td>";
		echo "</tr>";
		
		
	echo "</table>";

?>


</body>