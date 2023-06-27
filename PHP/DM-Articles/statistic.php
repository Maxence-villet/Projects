<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>DM</title>
</head>
<body>
    <?php    
        session_start();
        require_once "conn.php";
        $name = $_SESSION['name'];
        $req = "SELECT jaime, commentaire, bookmark, vue FROM article WHERE name_utilisateur = '$name'";

        $jaime = 0;
        $commentaire = 0;
        $bookmark = 0;
        $vue = 0;
        if($sel_query = mysqli_query($conn, $req)){
            while ($row = mysqli_fetch_assoc($sel_query)) {
                $jaime += $row['jaime'];
                $commentaire += $row['commentaire'];
                $bookmark += $row['bookmark'];
                $vue += $row['vue'];
        }
        
    }


    ?>
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
            
            <h1 class="static">Your Articles</h1>
            <center>
                <div class="stats_global">
                    <div class="stats">
                        <h3></h3>
                        <div class="title_send">
                            <div class="display_icon_stats">
                                <?php echo "<h2>$vue</h2>"?>
                                <img src="assets/img/icon/15.png" alt="view" width=25%>
                            </div>
                        </div>
                    </div> <!--Vue-->

                    <div class="stats">
                        <h3></h3>
                        <div class="title_send">
                            <div class="display_icon_stats">
                                <?php echo "<h2>coming soon</h2>"?>
                                <img src="assets/img/icon/14.png" alt="view" width=25%>
                            </div>
                        </div>
                    </div> <!--jaime-->

                    <div class="stats">
                        <h3></h3>
                        <div class="title_send">
                            <div class="display_icon_stats">
                                <?php echo "<h2>coming soon</h2>"?>
                                <img src="assets/img/icon/13.png" alt="view" width=25%>
                            </div>
                        </div>
                    </div> <!--commentaire-->

                    <div class="stats">
                        <h3></h3>
                        <div class="title_send">
                            <div class="display_icon_stats">
                                <?php echo "<h2>coming soon</h2>"?>
                                <img src="assets/img/icon/12.png" alt="view" width=25%>
                            </div>
                        </div>
                    </div> <!--bookmark-->
                </div>
            </center>
        </div>
    </div>
</body>
</html>
</body>
</html>