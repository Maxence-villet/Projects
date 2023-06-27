<?php
require_once "conn.php";
session_start();
$req_sel = "";
if (!empty($_POST)) {
    // Connexion à la base de données
    

    // Récupération des champs du formulaire
    $file = $_FILES["image"];
    $file_name = $_FILES["image"]["name"];
    $file_tmp_name = $_FILES["image"]["tmp_name"];

    // Préparation de la requête SQL
    $req = "UPDATE utilisateur SET avatar='$file_name' WHERE name='{$_SESSION['name']}'";
    
    // Exécution de la requête
    $resultat = mysqli_query($conn, $req);
    $path = "assets/stockage/avatar/";

    if (move_uploaded_file($file_tmp_name, $path.$file_name)) {
        if ($resultat) {
            $req_sel = "";
        } else {
            echo "Erreur lors de la mise à jour de l'image : " . mysqli_error($conn);
        }
    } else {
        echo "Erreur lors du chargement de l'image.";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>D&M</title>
</head>
<body>
    <div class="box">
        <div class="left">
            <div class="logo">
                <center><img src="assets/img/logo/0.png" alt="D&M" width="85%" height="85%"></center>
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
            <div class="profil">
                <div class="avatar">
                    <form method="POST" enctype="multipart/form-data">
                        <label class="file-container">
                            <input type="file" id="file-input" class="hidden" name="image" accept=".png, .jpeg, .jpg">
                            <?php

                                $req_sel = "SELECT avatar FROM utilisateur WHERE name='{$_SESSION['name']}'";
                                if (mysqli_query($conn, $req_sel) != NULL){
                                    if ($sel_query = mysqli_query($conn, $req_sel)) {
                                        if ($row = mysqli_fetch_assoc($sel_query)) {
                                            $avatar = $row['avatar'];
                                            echo '<img src="assets/stockage/avatar/' . $avatar . '" alt="Upload" width="128px" height="128px">';
                                        }
                                    }else{
                                        echo '<img src="assets/img/icon/11.png" alt="Upload" width="360px" height="360px">';
                                    }
                                }
                                else{
                                    echo '<img src="assets/img/icon/11.png" alt="Upload" width="360px" height="360px">';
                                }
                            ?>

                            
                            
                        </label>
                        <input type="submit" name="publier" value="Edit" class="btn"/>
                    </form>
                </div>
                <div class="about">
                   <div class="name">
                        <h1><?php echo $_SESSION['name'];?></h1>
                   </div>
                    <div class="likes">
                        <h3>154</h3>
                        <img src="assets/img/icon/14.png" alt="like" width="75px" height="75px" class="like">
                    </div>
                </div>           
            </div>
            <div class="article_profil">
                <iframe src="display_profil.php" frameborder="0" class="article_profil"></iframe>
            </div>
        </div>
    </div>
<?php   
    mysqli_close($conn);
?>
</body>
</html>

