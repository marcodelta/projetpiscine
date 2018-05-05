<?php
	session_start();
?>


<?php

	$database = "net4work";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
 
	if ($db_found) { 
		$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
		$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
		$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
		$poste = isset($_POST["poste"]) ? $_POST["poste"] : "";
		$entreprise = isset($_POST["entreprise"]) ? $_POST["entreprise"] : "";

		$test = 0;


		if(($prenom != "") OR ($nom != "") OR ($poste != "") OR ($entreprise != "") OR ($mail != ""))
		{
			$sql = "SELECT prenom, nom, poste, entreprise FROM utilisateur WHERE ";
		
			if ($prenom != "") {
				$sql .= "prenom LIKE '%$prenom%'";
				$test = 1;
			}
			if($nom != "" ) {
				if($test == 1){
					$sql .= "AND nom LIKE '%$nom%' ";
				}
				else {
					$sql .= "nom LIKE '%$nom%' ";
					$test = 1;
				}
			}
			if ($poste != "") {
				if($test == 1){
					$sql .= "AND poste LIKE '%$poste%' ";
				}
				else {
					$sql .= "poste LIKE '%$poste%' ";
					$test = 1;
				}
			}
			if($entreprise != "" ) {
				if($test == 1){
					$sql .= "AND entreprise LIKE '%$entreprise%' ";
				}
				else {
					$sql .= "entreprise LIKE '%$entreprise%' ";
					$test = 1;
				}
			}

			if($mail != "") {
			$sql1 = "SELECT iduser FROM connection WHERE email LIKE '%$mail%'";
			$result = mysqli_query($db_handle,$sql1);
			$data = mysqli_fetch_assoc($result);
			$idu = $data['iduser'];
			$sql = "SELECT prenom, nom, poste, entreprise FROM utilisateur WHERE iduser LIKE '%$idu%'";
			}

			$req = mysqli_query($db_handle,$sql);

			while($data = mysqli_fetch_assoc($req)) {
					echo  $dat['prenom'] . " ";
					echo  $dat['nom'] . " ";
					echo  $dat['poste'] . " ";
					echo  $dat['entreprise'] . '<br>';
			}
		}
		else {
			header("Location:ajoutami.html");
		}
		

	}

	else {
 		echo "Database not found";
	 }

	//fermer la connection
	mysqli_close($db_handle); 
?>