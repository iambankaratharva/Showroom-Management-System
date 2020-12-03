<?php
	 system ('gpio write 1 0');
?>

<html>
	<head>
		<title> LED CONTROL</title>
	</head>
	<body>
		<h1 align="center"> Control Your LED</h1>
		<from method="post">
			<table align="center">
				<tr align="Center">
				<th align="Center"><input type="submit" name="on" value="ON" ></th>
				<th align="Center"><input type="submit" name="off" value="OFF" ></th>
				</tr>
			</table>	
		</form>
	</body>
</html>	
<?php
	if(isset($_POST['on']))	
	{
		system('gpio write 1 1');
	}
	if(isset($_POST['off']))	
	{
		system('gpio write 1 0');
	}
?>
