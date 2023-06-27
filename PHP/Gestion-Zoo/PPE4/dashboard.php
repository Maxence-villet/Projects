<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
    exit();
}

// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Récupérer la liste des animaux et des enclos depuis la base de données
$sql_animaux = "SELECT a.id_animal, a.pseudo, e.nom_enclos, a.commentaire
                FROM Animaux a LEFT JOIN Loc_animaux l ON a.id_animal = l.id_animal
                LEFT JOIN Enclos e ON l.id_enclos = e.id_enclos
                ORDER BY a.id_animal ASC";
$result_animaux = mysqli_query($conn, $sql_animaux);

$sql_enclos = "SELECT * FROM Enclos";
$result_enclos = mysqli_query($conn, $sql_enclos);

// Vérifier si le formulaire d'ajout d'animal a été soumis
if (isset($_POST['ajouter_animal'])) {
    // Récupérer les données du formulaire
    $pseudo = $_POST['pseudo'];
    $id_espece = 1;
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $commentaire = $_POST['commentaire'];

    // Insérer le nouvel animal dans la base de données
    $sql_insert_animal = "INSERT INTO Animaux (id_espece, date_naissance, sexe, pseudo, commentaire)
                          VALUES ('$id_espece', '$date_naissance', '$sexe', '$pseudo', '$commentaire')";
    mysqli_query($conn, $sql_insert_animal);
    header("location: dashboard.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Parc Zoologique</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Dashboard</h1>
    <h2>Liste des animaux</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <!-- <th>Enclos</th> -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row_animal = mysqli_fetch_assoc($result_animaux)) { ?>
                <tr>
                    <td><?= $row_animal['id_animal'] ?></td>
                    <td><?= $row_animal['pseudo'] ?></td>
                    <td>
                        <form method="POST" action="supprimer_animal.php">
                            <input type="hidden" name="id_animal" value="<?= $row_animal['id_animal'] ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="modifier_animal.php">
                            <input type="hidden" name="id_animal" value="<?= $row_animal['id_animal'] ?>">
                            <button type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                    <button onclick="alert('Commentaire : <?= $row_animal['commentaire'] ?>')">Commentaire</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<h2>Ajouter un animal</h2>
<form method="POST">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>
    <br>
    <label for="id_espece">Espèce :</label>
    <input id="id_espece" name="id_espece" type="text">
        <?php
        // Récupérer la liste des espèces depuis la base de données
        $sql_especes = "SELECT * FROM Especes";
        $result_especes = mysqli_query($conn, $sql_especes);
        while ($row_espece = mysqli_fetch_assoc($result_especes)) {
            echo '<option value="' . $row_espece['id_espece'] . '">' . $row_espece['nom_race'] . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="date_naissance">Date de naissance :</label>
    <input type="date" id="date_naissance" name="date_naissance" required>
    <br>
    <label for="sexe">Sexe :</label>
    <select id="sexe" name="sexe">
        <option value="M">Mâle</option>
        <option value="F">Femelle</option>
    </select>
    <br>
    <label for="commentaire">Commentaire :</label>
    <textarea id="commentaire" name="commentaire"></textarea>
    <br>
    <input type="submit" name="ajouter_animal" value="Ajouter">
</form>
<br><br>

<table class="bg_table">
    <tr >
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