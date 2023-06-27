<?php
 require_once 'config.php';

 // Vérifier si l'ID de l'animal a été envoyé
 if (isset($_POST['id_animal'])) {
     $id_animal = $_POST['id_animal'];

     // Supprimer l'animal de la base de données
     $sql_delete_animal = "DELETE FROM Animaux WHERE id_animal = '$id_animal'";
     mysqli_query($conn, $sql_delete_animal);

     // Rediriger l'utilisateur vers la liste des animaux
     header("location: dashboard.php");
     exit();
 }
 ?>