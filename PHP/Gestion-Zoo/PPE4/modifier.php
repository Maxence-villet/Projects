<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
    exit();
}

require_once 'config.php';

// Vérifier si le formulaire de modification d'employé a été soumis
if (isset($_POST['edit'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $fonction = $_POST['fonction'];
    $salaire = $_POST['salaire'];

    // Mettre à jour l'employé dans la base de données
    $sql_update = "UPDATE personnels SET nom='$nom', prenom='$prenom', fonction='$fonction', salaire='$salaire'
                   WHERE id_personnel=$id";
    mysqli_query($conn, $sql_update);

    header('Location: personnel.php');
    exit();
}

// Récupérer les informations de l'employé à modifier depuis la base de données
$id = $_POST['id'];
$sql = "SELECT * FROM personnels WHERE id_personnel=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un personnel</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Modifier un personnel</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $row['id_personnel'] ?>">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" value="<?= $row['nom'] ?>"><br>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" value="<?= $row['prenom'] ?>"><br>
        <label for="fonction">Fonction:</label>
        <input type="text" name="fonction" value="<?= $row['fonction'] ?>"><br>
        <label for="salaire">Salaire:</label>
        <input type="number" name="salaire" value="<?= $row['salaire'] ?>"><br>
        <button type="submit" name="edit">Modifier</button>
    </form>
    <table class="bg_table">
        <tr>
            <td class="bg_table">
                <button><a href="logout.php">Déconnexion</a></button>   
            
            </td>
            <td class="bg_table">
                <button class="retour"><a href="personnel.php">Retour</a></button>
            </td>
        </tr>
    </table>
    <footer>
		<p>Parc Zoo - Tous droits réservés</p>
		<p>© Copyright 2023</p>
	</footer>
</body>
</html>
