<?php
session_start();
require_once "conn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/write.css">
    
    <title>D&M</title>
</head>
<body>
    <div class="box">
        <div class="left">
            <div class="logo">
                <center><a href="index.php"><img src="assets/img/logo/0.png" alt="D&M" width="85%" height="85%"></a></center>
            </div>
            <div class="icon">
                <center>
                    <a href="index.php"><img src="assets/img/icon/16.png" alt="home"></a>
                    <a href="profil.php"><img src="assets/img/icon/11.png" alt="profil"></a>
                    <a href="write.php"><img src="assets/img/icon/17.png" alt="write"></a>
                    <a href="statistic.php"><img src="assets/img/icon/18.png" alt="analyst"></a>
                    <a href="#"><img src="assets/img/icon/3.png" alt="subscribe"></a>
                    <a href="destroySess.php" class="bonhomme"><img src="assets/img/icon/9.png" alt="login"></a>
                </center>
            </div>
        </div>
        <div class="right">
            <center>
                <div class="article">
                    <form method="POST" enctype="multipart/form-data" class="form" id="usrform">
                        <div class="form" >
                            <div class="title_send">
                                <input class="titre" type="text" name="titre" placeholder="Title" class="titre" required>
                                <label class="file-container">
                                <input type="file" name="image" accept=".png, .jpeg, .jpg" class="hidden" required/>
                                <img class="template" src="assets/img/icon/20.png" alt="">
                                </label>
                                <button type="submit">PUBLISH</button>
                            </div>
                            <textarea name="content" placeholder="Text..."></textarea required>  
                            <br>
                            <br>
                        </div>
                    </form>        
                      
                </div>
            </center>
        </div>
    </div>

    <?php
    
    
    if (!empty($_POST)) {
        // Connexion à la base de données
        
        
        // Récupération des champs du formulaire
        $titre = htmlentities($_POST['titre']);
        $content = htmlentities($_POST['content']);
        $file = $_FILES["image"];
        $file_name = $_FILES["image"]["name"];
        $file_tmp_name = $_FILES["image"]["tmp_name"]; 
        $user_name = $_SESSION['name'];
        
        // Préparation de la requête
        $req = "INSERT INTO article (titre, content, img, name_utilisateur) VALUES ('$titre', '$content', '$file_name', '$user_name')";
        
        // Exécution de la requête
        $resultat = mysqli_query($conn, $req);
        $path = "assets/stockage/template/$file_name";
        
        if (move_uploaded_file($file_tmp_name, $path)) {
            if ($resultat) {
                echo "Article ajouté avec succès.";
                
                $req_share = "SELECT id_article FROM article WHERE name_utilisateur = '$user_name' ORDER BY id_article DESC LIMIT 1;";
                
                if ($share_id = mysqli_query($conn, $req_share)) {
                    
                    if(!empty($share_id)){
                    if ($row = mysqli_fetch_assoc($share_id)) {
                        $share = $row['id_article'];
                        $share_hash = md5(strval($share));
                        $max = $row['id_article'];
                        $req_send = "UPDATE article SET link_share = '$share_hash' WHERE id_article = (SELECT MAX(id_article) FROM article);";
                        if (mysqli_query($conn, $req_send)) {
                            mysqli_close($conn);
                            header('location: index.php');
                            exit; // Ajout d'un exit pour terminer le script après la redirection
                            
                        }
                        }
                    }
                }
                
                }
            } else {
                echo "Erreur d'ajout d'article" . mysqli_error($conn);
            }
        } else {
            echo "Erreur de chargement de l'image.";
        }
    mysqli_error($conn);    
    mysqli_close($conn);

    ?>
    
