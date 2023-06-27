<html>
    <body>
        Nous sommes le <?php echo Date("j/m/Y"); ?><br/>

        <?php
        echo "il est ".Date("H:i:s")."<br/>";
        if (Date("H") < 12)
        {
            echo "Bon matin ..";
        }
        else
        {
            echo "Bonne après midi ..";
        }
        ?>






    </body>




</html>