<?php
	session_start();
?>

<?php

$database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect('localhost', 'root', '');
 $db_found = mysqli_select_db($db_handle, $database);
 //si la BDD existe, faire le traitement
 

 if ($db_found) { 
	$sql = "SELECT nom, prenom, poste, entreprise FROM utilisateur WHERE iduser LIKE '".$_SESSION['ID']."' ";
	$requete = mysqli_query($db_handle,$sql);
	$data = mysqli_fetch_assoc($requete);

	$name = $data['nom'];
	$prenom = $data['prenom'];
	$poste = $data['poste'];
	$entreprise = $data['entreprise'];

  $sql1 = "SELECT email FROM connection WHERE iduser LIKE '".$_SESSION['ID']."' ";
  $requete1 = mysqli_query($db_handle,$sql1);
  $data1 = mysqli_fetch_assoc($requete1);
  $mail = $data1['email'];

 	}
else {
 	echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle); 


?>


<!DOCTYPE html>
<!-- Sources:  -->
<html>
<head>

	<title>Profil</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="myScript.js">
  
</script>
</head>
<body>
   
   <!-- Here is the topcolumn area -->
    <div id="buttoncolumn">
   <img src="logo.png" alt="net4work" width="130" height="100" />
  <!--  <input type="search" id="maRecherche" class="search" name="q"
    placeholder="Recherche sur le site…" required > 
    <button>Rechercher</button> 
    <span class="validity"></span> -->
    <a href="main.html"><img id="image0" src="accueil.png" alt="Accueil" width="98" height="57" onmouseenter ="changeImage(this)"/></a>
    <a href="profil.php"><img id="image1" src="vous.png" alt="Profil" width="98" height="57" onmouseenter ="changeImage2(this)"/></a>
    <a href="reseau.php"><img id="image2" src="reseau.png" alt="Reseau" width="98" height="57" onmouseenter ="changeImage3(this)"/></a>
    <a href="notif.html"><img id="image3" src="notifications.png" alt="Notifications" width="98" height="57" onmouseenter="changeImage4(this)"/></a>
    <a href="messagerie.html"><img id="image4" src="messagerie.png" alt="Messagerie" width="98" height="57" onmouseenter="changeImage5(this)"/></a>
    <a href="emplois.html"><img id="image5" src="emplois.png" alt="Emplois" width="98" height="57" onmouseenter ="changeImage6(this)"/></a>

   <p class="gwd-p-13zt"><br> 
  </p>
  <strong class="gwd-span-14na">Mes documents</strong>
  <strong class="gwd-span-45s9"> Mes photos</strong>
  <strong class="gwd-strong-1tex">Mes vidéos</strong>
  <strong class="gwd-strong-kwsw"><?php echo $prenom, " ", $name ?><br>
  <span class="gwd-span-hb4w"><?php echo $poste, " à ", $entreprise ?><br>Bonjour!<br><br><br><br><br><br><br><br><br></span>
  <span class="gwd-span-1e6n"><?php echo "adresse mail : ", $mail?><br><br><br></span></strong>
  <strong class="gwd-strong-12j0">Mon activité</strong>

 <div id="footer">Copyright &copy; 2018 net4work Properties<br/>
<a href="mailto:net4work@gmail.com">net4work@gmail.com</a></div>

</body>
</html>