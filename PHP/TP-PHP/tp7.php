<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>
    
<?php


    $us = $_POST['user'];
    $pass = $_POST['passwd'];


    if($us == 'admin' && $pass == 'admin')
    {
        echo 'Bienvenue '.$us.' vous êtes connecté'.'<br/>';
        echo ' il est : '.Date('H:i').' le : '.Date('j/m/Y');  
    }
    else
    {
        echo 'Mot de passe Erronée, '.'<a href="javascript:history.back()">Réessayer</a>';
    } 













?>
</body>

</html>
