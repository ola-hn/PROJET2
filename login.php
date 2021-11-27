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
         <div>
             <button><a href="login.php?supression=true">Supprimer son compte</a></button>
             <?php
             include "./logout.php";
             if(isset($_GET['supression'])){
                $d = $_SESSION['id'];
                $query = "DELETE FROM utilisateur WHERE id_utilisateur='$d'";
                $del = mysqli_query($db,$query);
                if($del){
                    mysqli_close($db);
                    header("location: index.php?erreur=succès");
                    exit();
                }
                else{
                    header("location: index.php?erreur=pasdesupression");
                    echo "Echo deleting record";

                }
             }
             
             ?>
         </div>       
    </body>
</html>