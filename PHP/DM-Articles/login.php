<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LOGIN</title>
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
                    <form method="post">                       
                        <H1>LOGIN</H1>
                        <h3 class="Username">Username : </h3><input type="text" name="login" value="" class="connect">
                        <h3 class="Password">Password : </h3><input type="password" name="password" value="" class="connect">
                        <a href="signIn.php?error=NULL" class="sign" class="connect">create a account?</a>
                        <button type="submit" class="btn"><center><img src="assets/img/icon/0.png" alt="OK"></center></button>                       
                    </form>
                    </div>
                </div>  
            </center>      
    </div>
    
    <?php
    

    if(!empty($_POST)){
        require_once "conn.php";
        $user= $_POST['login'];
        $pass= md5($_POST['password']);

        $req="SELECT password FROM utilisateur WHERE name = '$user'";
        $result=mysqli_query($conn, $req);

        if($result && mysqli_num_rows($result) > 0){
            echo 'salut';
            session_start();
            $_SESSION['name'] = $user;
            header("location:index.php");
        }
        else{
            echo 'comme tu veux';
        }
        
        mysqli_close($conn);
        header("location:index.php");
    }
?>

</body>
</html>