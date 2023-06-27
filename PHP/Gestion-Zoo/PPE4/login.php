<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['login']) || empty($_POST['password'])) {
        $error = "Veuillez saisir votre nom d'utilisateur et votre mot de passe";
    } else {
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Connexion à la base de données
        $mysqli = new mysqli("localhost", "root", "", "ppe4");

        // Vérification de la connexion
        if ($mysqli->connect_errno) {
            echo "Erreur de connexion à la base de données : " . $mysqli->connect_error;
            exit();
        }

        // Requête pour récupérer les informations de l'utilisateur
        $query = "SELECT * FROM Personnels WHERE login='$login' AND mdp='$password'";
        $result = $mysqli->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['login_user'] = $login;
            $_SESSION['user_type'] = $row['fonction'];
            $_SESSION['sound'] = 1;
            header("location: acceuil.php"); // Redirection vers la page de tableau de bord
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
            echo '<audio id="sound" src="son/invalid-selection-39351.mp3" autoplay></audio>';

        }

        $mysqli->close(); // Fermeture de la connexion à la base de données
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion - Parc Zoo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header>
    <h1>Connexion - Parc Zoo</h1>
</header>
<main>
    <form method="post">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="login" required><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Connexion" class="submit"><br><br>
        <span><?php echo $error; ?></span>
    </form>
</main>
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
</script>
</html>
