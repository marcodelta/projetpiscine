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
		echo $login, $pass, $nom, $prenom, $entreprise, $poste;
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


<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="prime.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="inscription.php" method="post">

<h1 id="logo2">
       <img src="logo.png" alt="Prime Properties" width="250" height="180" />
  </h1>

<div id="inscription" width="300" height="300">
</div>

<div id="suppression" width="300" height="300">
</div>

<div id="encadrement" width="10" height="10">
</div>

<div id="champ1">
<table>
<tr>
<td class="inscription_col_gauche">Adresse mail:</td>
<td>Prénom : <td/><td><input type="text" name="prenom"></td>
</tr>
<tr>
<td class="inscription_col_gauche"><input type="email" name="mail"/></td>
<td>Nom : <td/><td><input type="text" name="nom"></td>
</tr>
<tr>
<td class="inscription_col_gauche">Mot de passe:</td>
<td>Entreprise : <td/><td><input type="text" name="entreprise"></td>
</tr>
<tr>
<td class="inscription_col_gauche"><input type="password" name="passw"/></td>
<td>Poste : <td/><td><input type="text" name="poste"></td>
</tr>

<tr>
<td></td><td></td>
<td colspan="2">
<input type="submit" value="Valider" />
</td>
</tr>
</form>
</table>
</div>

<form>
<p id="positionmail">Adresse mail:</p>
<input type="email" name="mailsup" id="supprmail"/>
<input type="submit" value="Valider" id=validersuppr />
</form>
<div id="titreinscription">
	<p> Ajouter </p>
	
</div>

<div id="encadrement2" width="10" height="10">
</div>

<div id="titresuppression">
<p>Supprimer</p>
</div>

<div id="error">
</div>
<div id="footer">Copyright &copy; 2018 net4work Properties <a href="mailto:net4work@gmail.com">net4work@gmail.com</a></div>
</form>
</body>
</html>