<?php
	session_start();
	include 'connection.php';
	if($_SESSION['log']==1){
		echo 'Benvenuto';
	}
?>


<html>
	<body>
		<form action='Sign in.php'>
			<input type="submit" name="registrati" value="Registrati"><br />
		</form>
		
		<form action='Login.php'>
			<input type="submit" name="login" value="Login"><br />
		</form>
		
		<form action='Logout.php'>
			<input type="submit" name="logout" value="Logout"><br />
		</form>
	</body>
</html>