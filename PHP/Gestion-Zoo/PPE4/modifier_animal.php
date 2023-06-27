<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
    exit();
}

// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Vérifier si l'identifiant de l'animal à modifier a été fourni
if (!isset($_POST['id_animal'])) {
    header('Location: dashboard.php');
    exit();
}

$id_animal = $_POST['id_animal'];

// Récupérer les informations sur l'animal depuis la base de données
$sql_animal = "SELECT * FROM Animaux WHERE id_animal = '$id_animal'";
$result_animal = mysqli_query($conn, $sql_animal);

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST['modifier_animal'])) {
    // Récupérer les données du formulaire
    $pseudo = $_POST['pseudo'];
    $id_espece = 1;
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $commentaire = $_POST['commentaire'];

    // Mettre à jour les informations sur l'animal dans la base de données
    $sql_update_animal = "UPDATE Animaux SET id_espece='$id_espece', date_naissance='$date_naissance', sexe='$sexe', pseudo='$pseudo', commentaire='$commentaire' WHERE id_animal='$id_animal'";
    mysqli_query($conn, $sql_update_animal);
    header("location: dashboard.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un animal - Parc Zoologique</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Modifier un animal</h1>
    <?php if ($row_animal = mysqli_fetch_assoc($result_animal)) { ?>
    <form method="POST">
        <input type="hidden" name="id_animal" value="<?= $row_animal['id_animal'] ?>">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" value="<?= $row_animal['pseudo'] ?>" required>
        <br>
        <label for="id_espece">Espèce :</label>
        <input id="id_espece" name="id_espece" type="text">
        </select>
        <br>
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?= $row_animal['date_naissance'] ?>" required>
        <br>
        <label for="sexe">Sexe :</label>
        <select id="sexe" name="sexe" required>
        <option value="M" <?php if ($row_animal['sexe'] == 'M') echo 'selected'; ?>>Mâle</option>
        <option value="F" <?php if ($row_animal['sexe'] == 'F') echo 'selected'; ?>>Femelle</option>
        <option value="I" <?php if ($row_animal['sexe'] == 'I') echo 'selected'; ?>>Indéterminé</option>
        </select>
        <br>
        <label for="commentaire">Commentaire :</label>
        <textarea id="commentaire" name="commentaire"><?= $row_animal['commentaire'] ?></textarea>
        <br>
        <button type="submit" name="modifier_animal">Modifier l'animal</button>
        </form>
        <?php } else { ?>
        <p>L'animal que vous essayez de modifier n'existe pas.</p>
        <?php } ?>
        <table class="bg_table">
            <tr >
                <td class="bg_table">
                    <button><a href="logout.php">Déconnexion</a></button>   
                
                </td>
                <td class="bg_table">
                    <button class="retour"><a href="dashboard.php">Retour</a></button>
                </td>
            </tr>
        </table>
        <footer>
		<p>Parc Zoo - Tous droits réservés</p>
		<p>© Copyright 2023</p>
	</footer>
    </body>
</html>
