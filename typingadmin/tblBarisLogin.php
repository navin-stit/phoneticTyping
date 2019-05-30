<?
ob_start();
session_start();
ob_end_clean();
?>

<table border="1" align='center' width='700'>
	<tr>
		<td height='10' colspan='3' align='right' bgcolor='white'><font size='2'><b>Login as : <?=$_SESSION['namaUser']?></b></font></td>
	</tr>
</table>