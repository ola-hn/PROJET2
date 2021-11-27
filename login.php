<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <button><a href="login.php?deconnexion=true">Déconnexion</a></button>
            <?php
                session_start();
                if(isset($_GET['deconnexion'])){
                    if($_GET['deconnexion']==true){
                        session_unset();
                        header("location: index.php");
                    }
                }
                else if(($_SESSION['email'] !== "") && ($_SESSION['prenom'] !== "")){
                    $user = $_SESSION['email'];
                    $prenom =  $_SESSION['prenom'];
                    echo "<br>Bonjour à toi $user tu es connecté $prenom";
                }
            ?>
        </div>
    </body>
</html>