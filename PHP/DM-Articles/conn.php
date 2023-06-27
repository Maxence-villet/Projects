<?php
// Établir une connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$database = "article";

$conn = mysqli_connect($host, $user, $password, $database);

// Vérifiez si la connexion a réussi
if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}


?>