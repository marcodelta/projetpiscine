
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

   <p class="gwd-p-13zt"><br> 
           </p>

   <form action="cible_envoi2.php" method="post" enctype="multipart/form-data">
      <input type="text" name="monfichier" id="document" placeholder="Choisissez un pdf..."/><br />
        <input type="submit" class="staiv" id="send" value="Document" />
      </form>

       <form action="cible_envoi.php" method="post" enctype="multipart/form-data">
      <input type="text" name="monimage" id="photo" placeholder="Choisissez une image..."/><br />
        <input type="submit" class="staiv2" id="send" value="Image" />
      </form>

       <form action="cible_envoi3.php" method="post" enctype="multipart/form-data">
      <input type="text" name="mavideo" id="video"  placeholder="Choisissez une video..." /><br />
        <input type="submit" class="staiv3" id="send" value="Video"/>
      </form>
    
      <form action="cible_envoi4.php" method="post" enctype="multipart/form-data">
     <input type="text" id="maRecherche" class="search" name="montexte"
    placeholder="Exprimez vous..." >
            <input type="submit" value ="Publier" class="exprimezvous"  />
    </form>

         <svg data-gwd-shape="rectangle" class="gwd-rect-1rd7">
          <?php
          //identifier le nom de base de données
        $database = "net4work";
        //connecter l'utilisateur dans BDD
        //votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
       $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

          $sql = "SELECT * FROM photo,utilisateur";
          $sql2="SELECT* FROM fichier,utilisateur";
           $sql3 = "SELECT * FROM video,utilisateur";
          $sql4 ="SELECT* FROM texte,utilisateur ";

          

        $result = mysqli_query($db_handle,$sql);
        $result2 = mysqli_query($db_handle,$sql2);
        $result3= mysqli_query($db_handle,$sql3);
        $result4 = mysqli_query($db_handle,$sql4);

        while ($ligne = mysqli_fetch_assoc($result)) {
          ?>
          <img class="image" width="200" height="200" src=" <?php echo ($ligne['lien']) ;?>"/>
        <?php
        }

        while ($ligne = mysqli_fetch_assoc($result2)) {
          ?>
       <embed class="doc" width="300" height="300" type="application/pdf" src="<?php echo ($ligne['lien']) ;?>"/></embed>
        <?php
        }

        while ($ligne = mysqli_fetch_assoc($result3)) {
          ?>
           <div class="video">
        <object type="application/x-shockwave-flash" width="300" height="222" data="<?php echo ($ligne['lien']) ;?>">
          <param name="movie" value="<?php echo ($ligne['lien']) ;?>" />
          <param name="wmode" value="transparent" />
         Vous n'avez pas de navigateur moderne, ni Flash installé...
        </object>
        </div>

        <?php
        }
        while ($ligne = mysqli_fetch_assoc($result4)) {
          ?>
          <p class="texte"><?php echo ($ligne['texte']) ;?><br><br></p>
        <?php
        }
        ?>
          </svg> 

      <form action="recherche.php" method="post">
    <input type="search" id="RechercheContact" class="search" name="q"
    placeholder="Rechercher un contact..."  >
    <input type="submit" value="Envoyer" class="recherche">
    
  </form>

  
 
    

    <span class="gwd-span-1iq8"><br class="">Mes messages</span>
 <div id="footer">Copyright &copy; 2018 net4work Properties<br/>
<a href="mailto:net4work@gmail.com">net4work@gmail.com</a></div>

</body>
</html>