<?php
session_start();
require_once 'conn.php';

// Récupérez les données saisies par l'utilisateur à partir du formulaire d'inscription
$name = $_POST['name'];
$password = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']);

// Vérifiez si l'utilisateur existe déjà dans la base de données
$sql = "SELECT * FROM utilisateur WHERE name='$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // L'utilisateur existe déjà, renvoyer un message d'erreur
    echo "Cet utilisateur existe déjà.";
} else {
    if($password == $confirm_password){
        // L'utilisateur n'existe pas encore, insérez les données de l'utilisateur dans la table "utilisateur"
        $avatar = "11.png"; // Vous pouvez ajouter cette fonctionnalité plus tard si vous le souhaitez
        $date = date("Y-m-d"); // Date d'inscription de l'utilisateur

        $sql = "INSERT INTO utilisateur (name, password, date, avatar) VALUES ('$name', '$password', '$date', '$avatar')";

        if (mysqli_query($conn, $sql)) {
            // L'utilisateur a été créé avec succès, renvoyer un message de succès
            echo "Votre compte a été créé avec succès.";
        } else {
            // Une erreur s'est produite lors de la création de l'utilisateur, renvoyer un message d'erreur
            echo "Erreur: " . mysqli_error($conn);
        }

            

            // Set session variables
        
        $_SESSION['name'] = $name;




        header("Location: index.php");
    }else{
        header("Location: signIn.php?error=true");

    }
    
    
}

// Fermez la connexion à la base de données
mysqli_close($conn);

?>
