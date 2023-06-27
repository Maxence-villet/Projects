<?php
require_once "conn.php";
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/article.css">
    <title>D&M</title>
</head>
<body class="article">
    <div class="box">

                </center>
            </div>
        </div>
        <center>
            <div class="right">
            
            
                <?php
                    $id = $_GET['whatch'];
                    $req = "SELECT * FROM article WHERE link_share = '$id';";

                    if($query = mysqli_query($conn, $req)){
                        if ($row = mysqli_fetch_assoc($query)) {
                            $titre = $row['titre'];
                            $vue = $row['vue'];
                            $content = $row['content'];
                            $img = $row['img'];
                            $name = $row['name_utilisateur'];

                            echo '<img src="assets/stockage/template/'.$img.'"/>';
                            echo '<h1>'.$titre.'</h1>';
                            echo '<h5>Author : <strong>'.$name.'</strong></h5>';
                            echo '<h4>'.$content.'</h4>';
                    
                            $vue += 1;
                            $add_vue = "UPDATE article SET vue='$vue' WHERE link_share='{$id}'";
                            $vu_querry = mysqli_query($conn, $add_vue);
                    
                        }
                    }





                ?>
            
            </div>
        </center>
    </div>
<?php   
    mysqli_close($conn);
?>
</body>
</html>

