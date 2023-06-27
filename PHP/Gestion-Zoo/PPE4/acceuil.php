<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
    exit();
}
require_once 'config.php';

if ($_SESSION['user_type'] === 'Directeur') {
    $dashboard_link = 'dashboard.php';
    $personnel_link = 'personnel.php';

} else {
    $dashboard_link = 'dashboard.php';
    $personnel_link = '';

}

if($_SESSION['sound'] === 1){
    echo '<audio id="sound" src="son/welcome.mp3" autoplay></audio>';
    $_SESSION['sound'] = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="<?= $dashboard_link ?>" class="aceuil_btn">Gestion Animaux</a>
    <?php if ($personnel_link !== '') { ?>
        <a href="<?= $personnel_link ?>" class="aceuil_btn">Gestion personnel</a>
    <?php } ?>
    <table>
    <tr>
        <td>
            <button class="retour"><a href="logout.php" class="linkRetour">Déconnexion</a></button>   
        
        </td>
    </tr>
</table>
<footer>
		<p>Parc Zoo - Tous droits réservés</p>
		<p>© Copyright 2023</p>
	</footer>
</body>
</html>