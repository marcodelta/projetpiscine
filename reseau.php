<?php
  session_start();
?>


<!DOCTYPE html>
<!-- Sources:  -->
<html>
<head>

  <title>Mon Réseau</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="myScript.js">
  
</script>
</head>
<body>

   
   <!-- Here is the topcolumn area -->
    <div id="buttoncolumn">
   <img src="logo.png" alt="net4work" width="130" height="100" />
    <a href="main.php"><img id="image0" src="accueil.png" alt="Accueil" width="98" height="57" onmouseenter ="changeImage(this)"/></a>
    <a href="profil.php"><img id="image1" src="vous.png" alt="Profil" width="98" height="57" onmouseenter ="changeImage2(this)"/></a>
    <a href="reseau.php"><img id="image2" src="reseau.png" alt="Reseau" width="98" height="57" onmouseenter ="changeImage3(this)"/></a>
    <a href="notif.html"><img id="image3" src="notifications.png" alt="Notifications" width="98" height="57" onmouseenter="changeImage4(this)"/></a>
    <a href="messagerie.html"><img id="image4" src="messagerie.png" alt="Messagerie" width="98" height="57" onmouseenter="changeImage5(this)"/></a>
    <a href="emplois.html"><img id="image5" src="emplois.png" alt="Emplois" width="98" height="57" onmouseenter ="changeImage6(this)"/></a>
      <a href="connexion.html"><img id="image6" src="deconnexion.jpg" alt="Deconnexion" width="98" height="57" onmouseenter ="changeImage7(this)"/></a>
   </div>

	<p class="gwd-p-13zt"></p>

   <p class="ajoutAmi"> 
   <a href="ajoutami.html" class="nvcontact"><br class=""> Ajouter un nouveau contact</a>

  <span class="gwd-span-1iq8"><br class="">Mes messages</span>
    <form action="recherche.php" method="post">
      <input type="search" id="RechercheContact2" class="search" name="q"
    placeholder="Rechercher un contact" required > 

     <input type="submit" value="Envoyer" class="recherche">
  </form>

  <span class="gwd-span-1iq9">
    <?php

    $database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect('localhost', 'root', '');
 $db_found = mysqli_select_db($db_handle, $database);
 //si la BDD existe, faire le traitement

 if ($db_found) { 
    $sql = "SELECT idami FROM amis WHERE iduser LIKE '".$_SESSION['ID']."' ";
    $requete = mysqli_query($db_handle,$sql);

    while($data = mysqli_fetch_assoc($requete))
     {
        $sql1 = "SELECT nom, prenom FROM utilisateur WHERE iduser LIKE '".$data['idami']."' ";
        $req = mysqli_query($db_handle,$sql1);

        while ($dat = mysqli_fetch_assoc($req)) {
          echo $dat['prenom'], " ";
          echo $dat['nom']. " ". '<br>';
         
        }
     }
   }
   else {
  echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle); 

  ?>

    <br class=""></span>
  <span class="gwd-span-1iq10"><br>Afficher<br><br>
   Amis<br><br>
  Contact <br><br><br>
 <a href="ajoutami.html" class="nvcontact"> Ajouter un nouveau contact</a>
 </span>
    <input type="checkbox" name="Amis" class="Amis"> <br>
  <input type="checkbox" name="Contacts" class="Contacts"> <br>
  

 <div id="footer">Copyright &copy; 2018 net4work Properties<br/>
<a href="mailto:net4work@gmail.com">net4work@gmail.com</a></div>

</body>
</html>