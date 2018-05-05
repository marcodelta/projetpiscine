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



		if($mail != "") {
			$sql1 = "SELECT iduser FROM connection WHERE email LIKE '%$mail%'";
			$result = mysqli_query($db_handle,$sql1);
			$data = mysqli_fetch_assoc($result);
			$idu = $data['iduser'];

<<<<<<< HEAD
			$sql2 = "INSERT INTO amis (iduser, idami) VALUES ('".$_SESSION['ID']."', '".$idu."')";
			$req = mysqli_query($db_handle,$sql2);
			$sql3 = "INSERT INTO amis (iduser, idami) VALUES ('".$idu."','".$_SESSION['ID']."')";
			$req1 = mysqli_query($db_handle,$sql3);
			header("Location:reseau.php");
=======
			while($data = mysqli_fetch_assoc($req)) {
					echo  $dat['prenom'] . " ";
					echo  $dat['nom'] . " ";
					echo  $dat['poste'] . " ";
					echo  $dat['entreprise'] . '<br>';
>>>>>>> 816501c12d85e585347c1b39ee64bfc298dc3bdb
			}

		elseif($prenom != "") {
			if($nom != "") {
				$sql4 = "SELECT iduser FROM utilisateur WHERE nom LIKE '%$nom%' AND prenom LIKE '%$prenom%'";
				$req2 = mysqli_query($db_handle,$sql4);
				$data = mysqli_fetch_assoc($req2);
				$idu = $data['iduser'];
				echo $idu;
				echo "yo";
				echo $_SESSION['ID'];

				
				$sql2 = "INSERT INTO amis (iduser, idami) VALUES ('".$_SESSION['ID']."', '".$idu."')";
				$req = mysqli_query($db_handle,$sql2);
				$sql3 = "INSERT INTO amis (iduser, idami) VALUES ('".$idu."','".$_SESSION['ID']."')";
				$req1 = mysqli_query($db_handle,$sql3);
				header("Location:reseau.php");
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