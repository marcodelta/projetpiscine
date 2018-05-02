<?php
//identifier le nom de base de données
 $database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect(‘localhost’, ‘root’, ‘’);
 $db_found = mysqli_select_db($db_handle, $database);
 //si la BDD existe, faire le traitement
 
 if ($db_found) { 

	$login = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
	$pass = isset($_POST["passw"]) ? $_POST["passw"] : "";
	//mots de passe stockés dans le serveur

	$connection = false;

	$sql = SELECT * FROM `connection` WHERE `email` = "$login" AND `motdepasse` = "$pass";
	
		$connection = true;
	

	if($connection) {
		header("Location:main.html");
	}
	else {
		header("Location:connexion.html");
	}
}
else {
 	echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle); 
?>