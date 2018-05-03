
<?php
  session_start();
?>

<?php
 $notif = isset($_POST["q2"]) ? $_POST["q2"] : "";
$database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect('localhost', 'root', '');
 $db_found = mysqli_select_db($db_handle, $database);
 //si la BDD existe, faire le traitement

 if ($db_found) { 
  $sql = "INSERT INTO notification(iduser,descriptionnotif,provenancenotif,heure,date) VALUES ('0','". $notif ."','0','0','0') ";
  $requete = mysqli_query($db_handle,$sql);
  $data = mysqli_fetch_assoc($requete);

  $notif = $data['q2'];

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

	<title>Accueil</title>
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
    <a href="main.php"><img id="image0" src="accueil.png" alt="Accueil" width="98" height="57" onmouseenter ="changeImage(this)"/></a>
    <a href="profil.php"><img id="image1" src="vous.png" alt="Profil" width="98" height="57" onmouseenter ="changeImage2(this)"/></a>
    <a href="reseau.php"><img id="image2" src="reseau.png" alt="Reseau" width="98" height="57" onmouseenter ="changeImage3(this)"/></a>
    <a href="notif.html"><img id="image3" src="notifications.png" alt="Notifications" width="98" height="57" onmouseenter="changeImage4(this)"/></a>
    <a href="messagerie.html"><img id="image4" src="messagerie.png" alt="Messagerie" width="98" height="57" onmouseenter="changeImage5(this)"/></a>
    <a href="emplois.html"><img id="image5" src="emplois.png" alt="Emplois" width="98" height="57" onmouseenter ="changeImage6(this)"/></a>

   </div>
   
   <form action="cible_envoi.php" method="post" enctype="multipart/form-data">
   <p class="gwd-p-13zt"><br> 
        <input type="file" name="monfichier" id="document" /><br />
        <input type="submit" class="button" id="envoyer" />
        <embed name="mon fichier" class="pdf" width=300 height=300 type='application/pdf'/>
  </p>
  </form>

  <svg data-gwd-shape="rectangle" class="gwd-rect-1rd7">
   
     </svg>  

    <input type="search" id="maRecherche" class="search" name="q2"
    placeholder="Exprimez vous..." >

  <td colspan="2"><input type="submit" value="Envoyer" class="recherche">

  <input type="search" id="RechercheContact" class="search" name="q"
    placeholder="Rechercher un contact..." required >

       <span class="gwd-span-1iq8"><br class="">Mes messages</span>

 <div id="footer">Copyright &copy; 2018 net4work Properties<br/>
<a href="mailto:net4work@gmail.com">net4work@gmail.com</a></div>

</body>
</html>