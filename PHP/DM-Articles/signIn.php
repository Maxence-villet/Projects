<?php

if($_GET['error'] == "true"){
    echo "erreur de mot de passe, veuillez mettre le même mot de passe sur les deux cases ! ";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
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
                    <a href="login.php"><img src="assets/img/icon/10.png" alt="login"/></a>
                </center>
            </div>
        </div>
        <div class="right">
        <center class="center"> 
            <div class="input">    
                <div class="back">
                    <H1>SIGN IN</H1>
                    <form action="confirmSignIn.php" method="post">
                        <input type="text" name="name" placeholder="username" class="connect">
                        <input type="password" name="password" placeholder="password" class="connect">
                        <input type="password" name="confirm_password" placeholder="confirm password" class="connect">
                        <button type="submit"><img src="assets/img/icon/0.png" alt="Valide"></button>
                    </form>
                </div>
            </div>
        </center>
    </div>
</body>
</html>