<?php
//identifier le nom de base de données
 $database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect('localhost', 'root', '');
 $db_found = mysqli_select_db($db_handle, $database);
 //si la BDD existe, faire le traitement
 
 if ($db_found) { 

 	//on récupère les données entrés par l'utilisateur
	$login = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$pass = isset($_POST["passw"]) ? $_POST["passw"] : "";

	//$connection = false;

	//$reponse = "SELECT motdepasse FROM connection WHERE email = '".$login."'";
	//$reponse = "SELECT motdepasse FROM connection WHERE email LIKE '%$login%' ";
	$sql = "SELECT motdepasse FROM connection WHERE email LIKE '".$login."'";
	$reponse = mysqli_query($db_handle,$sql);
	$data = mysqli_fetch_assoc($reponse);
	
	echo $sql;

	if($data['motdepasse'] == $pass){
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