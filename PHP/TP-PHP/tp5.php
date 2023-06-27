<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP5</title>
</head>
<body>
    <?php
            $a = 0;
            $b = 0;
            $a = $_POST['prenom'];
            $b = $_POST['nom'];
            echo "Somme : ".$a+$b."<br/>";
            echo "Soustraction : ".$a-$b."<br/>";
            echo "Multiplication : ".$a*$b."<br/>";
            echo "Division : ".$a/$b."<br/>";






    ?>
</body>
</html>