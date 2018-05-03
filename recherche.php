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
	$recherche = isset($_POST["q"]) ? $_POST["q"] : "";
	$recherche = trim($recherche);

$requete="SELECT* FROM utilisateur WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' ";
$resultat = mysqli_query($db_handle,$requete);

while ($data = mysqli_fetch_assoc($resultat)){
echo "ID: " . $data['iduser'] . '<br>';
echo "Prenom: " . $data['prenom'] . '<br>';
echo "Nom: " . $data['nom'] . '<br>';
echo "Poste: " . $data['poste'] . '<br>';
echo "Entreprise: " . $data['entreprise'] . '<br>';


}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultat recherche</title>
</head>
<body>

</body>
</html>