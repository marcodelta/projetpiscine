<?php
if($search!= NULL) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{
$database = "net4work";
//connecter l'utilisateur dans BDD
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe
if ($db_found) {
$query = mysql_query("SELECT * FROM contact WHERE contact LIKE '%$search%' ORDER BY id_user") or die (mysql_error()); // la requête, que vous devez maintenant comprendre ;)
$nb_resultats = mysql_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
?>
<h3>Résultats de votre recherche.</h3>
<p>Nous avons trouvé <? echo $nb_resultats; // on affiche le nombre de résultats 
if($nb_resultats > 1) { echo 'résultats'; } else { echo 'résultat'; } // on vérifie le nombre de résultats pour orthographier correctement. 
?>
dans notre base de données. Voici les fonctions que nous avons trouvées :<br/>
<br/>
<?
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<a href="fonction.php?id=<? echo $donnees['id']; ?>"><? echo $donnees['nom_fonction']; ?></a><br/>
<?
} // fin de la boucle
?><br/>
<br/>
<a href="rechercher.php">Faire une nouvelle recherche</a></p>
<?
} // Fini d'afficher les résultats ! Maintenant, nous allons afficher l'éventuelle erreur en cas d'échec de recherche et le formulaire.
else
{ // de nouveau, un peu de HTML
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['requete']; ?>". <a href="rechercher.php">Réessayez</a> avec autre chose.</p>
<?
}// Fini d'afficher l'erreur ^^
mysql_close(); // on ferme mysql, on n'en a plus besoin
}