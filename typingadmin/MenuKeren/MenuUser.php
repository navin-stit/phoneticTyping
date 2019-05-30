<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title></title>
<meta http-equiv="content-type" content="text/html" />
<!-- Begin Vista-Buttons.com HEAD SECTION id=vbUL_3fd4a-->
<link href="index-files/styles_3fd4a.css" type="text/css" rel="stylesheet"/>
<style type="text/css">A#vbUL_3fd4aa{display:none}</style>
<!-- End Vista-Buttons.com HEAD SECTION -->
</head>
<body>
<!-- Begin Vista-Buttons.com BODY SECTION id=vbUL_3fd4a-->

<table border='0' id="vista-buttons_com_id3fd4a" width="0" cellpadding="0" cellspacing="0" border="0">
	
	<tr><td style="padding-bottom:0px" title ="Login">
	<a onclick='xpe("3fd4ao");xpshow("3fd4a",1,this);xpsmover(this);clickKeterangan(this)' id="login" onmouseout='xpsmout(this);'><img id="xpi_3fd4a" src="index-files/bt3fd4a_0.png" name="vb3fd4a" width="204" height="60" border="0" alt="Login" /></a><div>
	<ul id="vbUL_3fd4a" class="vbUL3fd4a">
		<li><a href="changePass.php" title="Change Password">Change&nbsp;Password</a></li>
		<li><a href="verifikasiUser.php" title="Verifikasi">Verifikasi</a></li>
		<li><a href="signout.php" title="Signout">Signout</a></li>
	</ul></div>
	</td>
	
	<td width="100" rowspan="5">
		&nbsp;
	</td>
	
	<td valign="top" rowspan="5">
		<img src="image/topInfo.jpg" width="383" height="30" /><br/> 
		<textarea name="txtKeterangan" id="txtKeterangan" rows="16" cols="45" readonly /></textarea>
	</td>
	</tr>
		
		
	<tr><td style="padding-bottom:0px" title ="Data Master">
	<a onclick='xpe("rfd4ao");xpshow("rfd4a",1,this);xpsmover(this);clickKeterangan(this)' id="master" onmouseout='xpsmout(this);'><img id="xpi_rfd4a" src="index-files/btrfd4a_0.png" name="vbrfd4a" width="204" height="60" border="0" alt="Data Master" /></a><div>
	<ul id="vbUL_rfd4a" class="vbUL3fd4a">
		<!--<li><a href="Master/barang.php" title="Barang">Master Barang</a></li>-->
		<li><a href="Master/siswa.php" title="Siswa">Master Siswa</a></li>
		</ul></div>
	</td></tr>
	
	
	<tr><td style="padding-bottom:0px" title ="Input PSB">
	<a onclick='xpe("6fd4ao");xpshow("6fd4a",1,this);xpsmover(this);clickKeterangan(this)' id="input" onmouseout='xpsmout(this);'><img id="xpi_6fd4a" src="index-files/bt6fd4a_0.png" name="vb6fd4a" width="204" height="60" border="0" alt="Input PSB" /></a><div>
	<ul id="vbUL_6fd4a" class="vbUL3fd4a">
		<li><a href="unit/" title="Input Pemesanan">Input&nbsp;Pemesanan</a></li>
	</ul></div>
	</td></tr>
	
	
	
	<tr><td style="padding-bottom:0px" title ="Laporan">
	<a onclick='xpe("2fd4ao");xpshow("2fd4a",1,this);xpsmover(this);clickLaporan(this)' id="laporanpsb" onmouseout='xpsmout(this);'><img id="xpi_2fd4a" src="index-files/bt2fd4a_0.png" name="vb2fd4a" width="204" height="60" border="0" alt="Laporan" /></a><div>
	<ul id="vbUL_2fd4a" class="vbUL3fd4a">
		<li><a href="Laporan/laporanByProduct.php?cbJenjang=ALL&filter=Filter" title="Penjualan By Procut">Lap Penjualan by Product</a></li>
		<li><a href="Laporan/laporanByCategory.php?cbJenjang=TK&filter=Filter" title="Penjualan By Category">Lap. Penjualan by Category</a></li>
		<li><a href="Laporan/penjualanBarangPelangganFaktur.php" title="Penjualan per Pelanggan">Lap.&nbsp;Penjualan&nbsp;by Pelanggan</a></li>
		
		</ul></div>
	</td></tr>
	
	
</table>



<script type="text/javascript"> var vbImgPath="index-files/"</script>
<script type="text/javascript" src="index-files/sc3fd4a.js"></script>
<a id="vbUL_3fd4aa" href="http://vista-buttons.com">Button Maker Web Page Buttons by Vista-Buttons.com v5.5</a>
<!-- End Vista-Buttons.com BODY SECTION -->


	<script>
		var statInfo = "kosong";
		if(statInfo=="kosong") {
			document.getElementById('txtKeterangan').value="";
			document.getElementById('txtKeterangan').value+="Info Menu-Menu Program Penjualan Toko dijabarkan disini\r-----------------------------------------------";
			document.getElementById('txtKeterangan').value+="Please Read Carefully if you not understand yet!!!\r\n\r\n";
			document.getElementById('txtKeterangan').value+="\nRegards";
			document.getElementById('txtKeterangan').value+="\nIT PAHOA";
		}
		
			
		function clickKeterangan(nama) {
			
			if(nama.id=="login") {
				if (statInfo != "login") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="LOGIN\r-----------------------------------------------"
					document.getElementById('txtKeterangan').value+="\nChange Pass"
					document.getElementById('txtKeterangan').value+="\nUntuk mengganti Password user \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nVerifikasi"
					document.getElementById('txtKeterangan').value+="\nUntuk Memverifikasi User yang baru daftar \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nSignout"
					document.getElementById('txtKeterangan').value+="\nKeluar Dari Program \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nManual"
					document.getElementById('txtKeterangan').value+="\nInstruksi Cara menggunakan Program PSB (tapi belum selesai) :p \n-----------------------------------------------";
					
					statInfo="login";
					
				}
			} else if (nama.id=="master") {
				if (statInfo != "master") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="DATA MASTER\r---------------------------------------------"
					document.getElementById('txtKeterangan').value+="\nMaster Barang"
					document.getElementById('txtKeterangan').value+="\nDigunakan untuk mengatur Item Barang \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nMaster Siswa"
					document.getElementById('txtKeterangan').value+="\nDigunakan untuk menampilkan Data Siswa \n---------------------------------------------";
					statInfo = "master"
				}
			} else if (nama.id=="input") {
				if (statInfo != "input") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="INPUT PSB\r---------------------------------------------"
					document.getElementById('txtKeterangan').value+="\nInput Pemensanan"
					document.getElementById('txtKeterangan').value+="\nDigunakan untuk menginput pemesanan \n---------------------------------------------";
					statInfo = "input";
				}
			} else if (nama.id="fasilitascari") {
				if (statInfo != "cari") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="Media Cari Data\r-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nCari Siswa Aktif"
					document.getElementById('txtKeterangan').value+="\nData siswa lama yang sudah bersekolah di PAHOA \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nCari Siswa Beli Formulir"
					document.getElementById('txtKeterangan').value+="\nData siswa Yang sudah membeli Formulir \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nCari Calon Siswa"
					document.getElementById('txtKeterangan').value+="\nData siswa yang sudah mengembalikan Formulir \n-----------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nPrediksi Siswa Beli 2 Form / Lebih"
					document.getElementById('txtKeterangan').value+="\nPREDISKI siswa yang membeli Form 2 kali atau lebih \n-----------------------------------------------";
					statInfo = "cari"
				}
			} 
			
		}
		
		function clickLaporan(nama) {
			if (nama.id="laporanpsb") {
				if (statInfo != "report") {
					document.getElementById('txtKeterangan').value="";
					document.getElementById('txtKeterangan').value+="Laporan\r---------------------------------------------"
					document.getElementById('txtKeterangan').value+="\nLap. Penjualan By Product"
					document.getElementById('txtKeterangan').value+="\nLaporang tentang penjualan barang per product \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nLap. Penjualan By Category"
					document.getElementById('txtKeterangan').value+="\nLaporang tentang penjualan barang per Category \n---------------------------------------------";
					document.getElementById('txtKeterangan').value+="\nLap. Penjualan By Detail"
					document.getElementById('txtKeterangan').value+="\nLaporang tentang penjualan barang per Barang per Pelanggan per Faktur \n---------------------------------------------";
					
					statInfo = "report";
				}
			}
		}
		
	</script>
	
</body>
</html>