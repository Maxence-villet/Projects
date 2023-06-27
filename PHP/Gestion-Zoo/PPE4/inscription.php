<?php
session_start();
require_once 'config.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    // Vérifier si l'employé existe déjà
    $sql_check = "SELECT * FROM personnels WHERE nom='$nom' AND prenom='$prenom'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // L'employé existe déjà, donc le mettre à jour avec le login et le mot de passe
        $row = mysqli_fetch_assoc($result);
        $id_personnel = $row['id_personnel'];

        $sql_update = "UPDATE personnels SET login='$login', mdp='$mdp' WHERE id_personnel=$id_personnel";
        mysqli_query($conn, $sql_update);

        $_SESSION['message'] = "L'employé $prenom $nom a été mis à jour avec succès.";
        $_SESSION['message_type'] = "success";
        header('Location: index.php');
        exit();
        }else {
        echo "nom & prenom invalides";
        echo '<audio id="sound" src="son/invalid-selection-39351.mp3" autoplay></audio>';
    }

    // Rediriger vers la page d'accueil

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Inscription</h1>

    <?php if (isset($_SESSION['message'])) { ?>
        <div>
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php } ?>

    <form method="post">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>

        <div>
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>
        </div>

        <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>

        <div>
        <input type="submit" name="submit" value="Inscription">
        </div>
    </form>
    <br><br>

<table class="bg_table">
    <tr>
        <td class="bg_table">
            <button class="retour"><a href="index.php">Retour</a></button>
        </td>
    </tr>
</table>
<footer>
		<p>Parc Zoo - Tous droits réservés</p>
		<p>© Copyright 2023</p>
	</footer>
    </body>
    </html>
