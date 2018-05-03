<?php

session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION['ID']=1;

?>

<?php
	$database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect('localhost', 'root', '');
 $db_found = mysqli_select_db($db_handle, $database);

 if ($db_found) { 
 	$login = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$pass = isset($_POST["passw"]) ? $_POST["passw"] : "";
	$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
	$entreprise = isset($_POST["entreprise"]) ? $_POST["entreprise"] : "";
	$poste = isset($_POST["poste"]) ? $_POST["poste"] : "";

	if(($login == "") OR ($pass == "") OR ($nom == "") OR ($prenom == "") OR ($entreprise == "") OR ($poste == "")) {
		//header("Location:Inscription.html");
		echo $login, $pass, $nom, $prenom, $entreprise, $poste, "yo";
	}
	else {
		$query = "INSERT INTO utilisateur(nom, prenom, poste, entreprise, grade) VALUES('".$nom."', '".$prenom."', '".$poste."', '".$entreprise."', 0)";
		mysqli_query($db_handle, $query);

		$sql = "SELECT iduser FROM utilisateur WHERE nom LIKE '".$nom."' AND prenom LIKE '".$prenom."' ";
		$reponse = mysqli_query($db_handle,$sql);
		$data = mysqli_fetch_assoc($reponse);
		$_SESSION['ID']=$data['iduser'];

		$req = "INSERT INTO connection (email, motdepasse, iduser) VALUES ('".$login."', '".$pass."', '".$_SESSION['ID']."')";
		mysqli_query($db_handle, $req);
		//header("Location:connexion.html");
		echo $login, $pass, $nom, $prenom, $entreprise, $poste, $_SESSION['ID'];
	}

	

}
else {
 	echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle); 

?>