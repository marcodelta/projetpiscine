<?php
$login = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
$pass = isset($_POST["passw"]) ? $_POST["passw"] : "";
//mots de passe stockés dans le serveur

$connection = false;

if($login=="admin" && $pass="admin") {
$connection = true;
}

if($connection) {
echo "Connexion okay.";
header("Location:main.html");
}
else {
echo "Connexion refusée.";
}
?>