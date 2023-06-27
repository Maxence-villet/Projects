<?php
session_start();
$name = $_SESSION['name'];
require_once "conn.php";
$req = "SELECT titre, img, name_utilisateur, link_share FROM article WHERE name_utilisateur = '$name' ORDER BY id_article DESC;";

if($sel_query = mysqli_query($conn, $req)){
    while ($row = mysqli_fetch_assoc($sel_query)) {
        $titre = $row['titre'];
        $name = $row['name_utilisateur'];
        $image = $row['img'];
        $link = $row['link_share'];
?>

        <div class="container" border='#000 3px solid'>
        <a href="article.php?whatch=<?php echo $link ?>" target="_blank"class="article">
            <div class="text">
                <h1><?php echo $name; ?></h1>
                <h3><?php echo $titre; ?></h3>
            </div>
            <div class="img">
                <?php 
                    if(strlen($image) >= 2){
                        echo "<img src='assets/stockage/template/" . $image . "' class='miniature' alt='Image de l'article'>";
                    }
                    ?>
                
            </div>
            </a>
        </div>
<?php
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
    <title>DM</title>
</head>
<body class="display">
    
</body>
</html>









