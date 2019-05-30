<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">	
</head>

<body bgcolor='orange'>

<form action="index.php" method="POST">
	<table width='200' border='1' align='center' rules=rows frame=box bgcolor='white' class="shadow_table">
		<tr bgcolor='white' CLASS='darkrow'>
			<td colspan="3"><b>Login</b></td>
		</tr>
		<tr>
			<td width="100">Username </td>
			<td>:</td> 
			<td><input type="text" name="username"/></td>
		</tr>
	
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"/></td>
		</tr>
		
		<tr>
			<td colspan="3"><input type="submit" value="login"/></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
	</table>
</form>


</body>
</html>