<?php

session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION['ID']=1;

?>

<?php

//identifier le nom de base de données
 $database = "net4work";
//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
 $db_handle = mysqli_connect('localhost', 'root', '');
 $db_found = mysqli_select_db($db_handle, $database);
 //si la BDD existe, faire le traitement

 if ($db_found) { 

$description= isset($_POST["description"]) ? $_POST["description"] : "";
$sql = "INSERT INTO description VALUES ('".$description."');";
$result = mysqli_query($db_handle, $sql);
}
?>