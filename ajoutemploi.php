<?php
	session_start();
?>


<?php

	$database = "net4work";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
 
	if ($db_found) { 
		$entreprise = isset($_POST["entreprise"]) ? $_POST["entreprise"] : "";
		$salaire = isset($_POST["salaire"]) ? $_POST["salaire"] : "";
		$contrat = isset($_POST["contrat"]) ? $_POST["contrat"] : "";
		$description = isset($_POST["description"]) ? $_POST["description"] : "";


		if($entreprise != "") {
			if($salaire != "") {
				if($contrat != "") {
					if($description != "") {
						$sql = "INSERT INTO emploi (iduser, entreprise, salaire, typedecontrat, descriptionduposte) VALUES('".$_SESSION['ID']."', '".$entreprise."', '".$salaire."', '".$contrat."', '".$description."')";
					}
				}
			}
			$reponse = mysqli_query($db_handle,$sql);
			//$data = mysqli_fetch_assoc($reponse);
			echo "Votre proposition a été enregistrée";

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