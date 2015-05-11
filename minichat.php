<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Minichat amélioré</title>
	</head>
	
	<body>

<?php
	try 
	{
		// Pour fonctionner, ce script doit d'abord être "initialisé" avec le fichier sql contenant notamment la création de la base et les infos user comme ci-dessous :
		// 		create database minichat;
		// 		create user 'minichat_user'@'localhost' identified by 'minichat_password';
		// 		grant all on minichat.* to 'minichat_user'@'localhost';

		$bdd = new PDO("mysql:host=localhost;dbname=minichat", "minichat_user", "minichat_password", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$bdd->exec("SET CHARACTER SET utf8");
	}
	catch(Exception $e)
	{
		die("Erreur : Accès base impossible. Avez-vous importé le fichier sql fourni pour pouvoir utiliser ce script ?");
	}
?>

		<div>
			<form action="minichat_post.php" method="POST">
				<input type="text" value="" name="pseudo"/>
				<textarea name="message"></textarea>
			</form>
		</div>
		
<?php
	$req = $bdd->prepare('select * from messages order by date desc limit 0,10');
	try{$req->execute();}
	catch (Exception $e)
	{
		die("Erreur rencontrée : <b>".$e->getMessage()."</b>");
	}
	while ($data = $req->fetch())
	{
		
	}
?>

	</body>
</html>