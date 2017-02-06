
<?php
	session_start();

	include 'connection.php';

	if($_SESSION['log']==0){
		
		$_SESSION['log']=0;
		echo "<html>
				<body>
					<form method='post'>
						Username: <input type='text' name='username' value=''></br>
						Password: <input type='password' name='password' value=''></br>
						<input type='submit' name='login' value='Login'>
					</form>
				</body>
			</html>";	
		if(isset($_POST['password'])){
			$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);
			$stm = $dbh->prepare('SELECT * FROM quintab_utenti.utenti u WHERE u.Password=":password" and u.Username=":username"');
			$stm->bindValue(':username',$_POST['username']);
			$stm->bindValue(':password',$_POST['password']);
			if($stm->execute() == true){
				$_SESSION['log']=1;
				header("location: Sito.php");
			}
		else{
			echo 'Username o password non valido.';
		}
	}
}
	else{
		echo 'Sei già loggato.';
	}
?>