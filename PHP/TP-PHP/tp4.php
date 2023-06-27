<html>
    <body>
        <h1>Affichage des donnees saisies</h1>


        <?php
            $a = $_POST['prenom'];
            $b = $_POST['nom'];
            echo $a+$b;
            ?>

            <a href="javascript:history.back()">Essayer a Nouveau</a>



    </body>
</html>