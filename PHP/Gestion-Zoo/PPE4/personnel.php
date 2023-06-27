<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
    exit();
}

require_once 'config.php';

// Récupérer la liste des employés depuis la base de données
$sql = "SELECT * FROM personnels";
$result = mysqli_query($conn, $sql);

// Vérifier si le formulaire d'ajout d'employé a été soumis
if (isset($_POST['ajouter'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $salaire = $_POST['salaire'];
    $personnel = 'Employé';
    // Insérer le nouvel employé dans la base de données
    $sql_insert = "INSERT INTO personnels (nom, prenom, date_naissance, salaire, fonction)
                   VALUES ('$nom', '$prenom', '$date_naissance', '$salaire', '$personnel')";
    mysqli_query($conn, $sql_insert);

    header('location: personnel.php');
}

// Vérifier si le formulaire de modification d'employé a été soumis
if (isset($_POST['modifier'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $salaire = $_POST['salaire'];

    // Mettre à jour l'employé dans la base de données
    $sql_update = "UPDATE personnels SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', salaire='$salaire'
                   WHERE id_personnel=$id";
    mysqli_query($conn, $sql_update);
}

// Vérifier si le formulaire de suppression d'employé a été soumis
if (isset($_POST['supprimer'])) {
    // Récupérer l'ID de l'employé à supprimer
    $id = $_POST['id'];

    // Supprimer l'employé de la base de données
    $sql_delete = "DELETE FROM personnels WHERE id_personnel=$id";
    mysqli_query($conn, $sql_delete);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des employés</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Gestion des employés</h1>
    <h2>Liste des employés</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Fonction</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id_personnel'] ?></td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                    <td><?= $row['fonction'] ?></td>
                    <td><?= $row['salaire'] ?></td>
                    <td>
                        <form method="post" action="modifier.php">
                            <input type="hidden" name="id" value="<?= $row['id_personnel'] ?>">
                            <button type="submit" name="modifier">Modifier</button>
                        </form>
                        <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $row['id_personnel'] ?>">
                            <button type="submit" name="supprimer">Supprimer</button>
                        </form>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                        <h2>Ajouter un employé</h2>
                        <form method="post" action="">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" required>
                        <br>
                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" required>
                        <br>
                        <label for="date_naissance">Date de Naissance :</label>
                        <input type="date" name="date_naissance" required>
                        <br>
                        <label for="salaire">Salaire :</label>
                        <input type="number" name="salaire" required>
                        <br>
                        <button type="submit" name="ajouter">Ajouter</button>
                        </form>
                        <br>
                        <table class="bg_table">
                            <tr>
                                <td class="bg_table">
                                    <button><a href="logout.php">Déconnexion</a></button>   
                                
                                </td>
                                <td class="bg_table">
                                    <button class="retour"><a href="acceuil.php">Retour</a></button>
                                </td>
                            </tr>
                        </table>
                        <footer>
		<p>Parc Zoo - Tous droits réservés</p>
		<p>© Copyright 2023</p>
	</footer>
</body>
</html>
