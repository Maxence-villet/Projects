
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/display.css">
    <title>DM</title>
</head>
<body class="display">
<form method="post">
    <input type="text" placeholder="Search" name="word">
    <button type="submit">Search</button>    

</form>

</body>
</html>


<?php
require_once "conn.php";

if (!empty($_POST)) {
    $word = $_POST['word'];
    $req = "SELECT titre, img, name_utilisateur, link_share FROM article WHERE titre LIKE '%$word%' OR name_utilisateur LIKE '%$word%' ORDER BY id_article DESC;";
} else {
    $req = "SELECT titre, img, name_utilisateur, link_share FROM article ORDER BY id_article DESC;";
}


if($sel_query = mysqli_query($conn, $req)){
    while ($row = mysqli_fetch_assoc($sel_query)) {
        $titre = $row['titre'];
        $name = $row['name_utilisateur'];
        $image = $row['img'];
        $link = $row['link_share'];

?>
        
        <div class="container" border='#000 3px solid'>
        <a href="article.php?whatch=<?php echo $link; ?>" target="_blank" class="article">
            <div class="box">
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
            </div>
            </a>
        </div>
        
<?php
    }
}
?>














