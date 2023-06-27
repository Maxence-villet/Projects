<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP6</title>
</head>
<body>
    <?php
        $a = $_POST['prenom'];
        $b = $_POST['nom'];
        $c = $_POST['operateur'];

        if ($c == '+')
        {
            echo "somme : ";
            echo $a+$b."<br/>";  
        }
        else if ($c == '-')
        {
            echo "soustraction : ";
            echo $a-$b."<br/>";
        }
        else if ($c == '*')
        {
            echo "Multiplication : ".$a*$b."<br/>";
        }
        else if ($c == '/')
        {
            echo "Division : ".$a/$b."<br/>";
        }
        else
        {
            echo "erreur";
        }








    ?>
</body>
</html>