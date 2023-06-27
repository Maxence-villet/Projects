<?php
session_start();
if(empty($_SESSION['name']))
{
    $_SESSION['name'] = NULL;

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
                    <?php
                    if(empty($_SESSION['name']))
                    {
                        
                    }
                    else
                    {
                        echo '<a href="profil.php"><img src="assets/img/icon/11.png" alt="profil"></a>';
                        echo '<a href="write.php"><img src="assets/img/icon/17.png" alt="write"></a>';
                        echo '<a href="statistic.php"><img src="assets/img/icon/18.png" alt="analyst"></a>';
                        echo '<a href="#"><img src="assets/img/icon/3.png" alt="subscribe"></a>';
                    }
                    ?>
                              
                </center>
            </div>
            <div class="log">
                <?php 
                    echo "<center>";
                    if(empty($_SESSION['name']))
                    {
                        echo '<a href="login.php"><img src="assets/img/icon/10.png" alt="login"/></a>';
                    }
                    else
                    {
                       echo '<a href="destroySess.php"><img src="assets/img/icon/9.png"/></a>';
                    }
                    echo "</center>"; 
                
                
                
                
                
                ?>
            </div>
        </div>
        <div class="right">
            <div class="all_screen">
                <iframe src="display.php" frameborder="0" class="all_screen"></iframe>
            </div>
        </div>
    </div>
</body>
</html>