<?php
	include 'connection.php';
?>
<html>
	<body>
			<?php
				session_start();
				$_SESSION['log']=0;
				try
				{
					if(isset($_POST['username']))
					{
						$dbh=new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);
						$stm = $dbh-> prepare('INSERT INTO quintab_utenti.utenti(Nome,Cognome,Username,Password) VALUES(:Nome,:Cognome,:Username,:Password)');
						$stm->bindValue(':Nome',$_POST['nome']);
						$stm->bindValue(':Cognome',$_POST['cognome']);
						$stm->bindValue(':Username',$_POST['username']);
						$stm->bindValue(':Password',$_POST['password']);
						if($stm->execute())
						{
							$_SESSION['log']=1;
							echo 'Inserimento riuscito <br />';
							echo 'Adesso puoi accedere al sito';
							header("location: Sito.php");
						}
						else{
							echo 'Problemi di inserimento';
						}
					}
				}
				catch(PDOexception $e)
				{
					echo 'Connessione non riuscita';
				}
			?>
			<form action= "http://localhost/informatica/5B%20IA/Esercizio%20utenti%20php/Sign%20in.php" method="POST">
				Nome:<input type="text" name="nome" value=""/><br />
				Cognome:<input type="text" name="cognome" value=""/><br />
				Username:<input type="text" name="username" value=""/><br />
				Password:<input type="password" name="password" value=""/><br />
						<input type="submit" name="registrati" value="Registrati"/><br />
			</form>
	</body>
</html>
