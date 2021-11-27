<?php
include "../signup/pdo.php";
session_start();
if(isset($_POST['submit'])){
    $db_username = 'root';
    $db_password = '';
    $db_name = 'sut';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('Connexion impossible à la base de données');

    $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
    $mdp = mysqli_real_escape_string($db, htmlspecialchars($_POST['mdp']));

    if($email !=="" && $mdp!==""){
        $requete = "SELECT id_utilisateur, nom, prenom FROM utilisateur WHERE email = '$email' and mdp = '$mdp'";
        $result = mysqli_query($db, $requete);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$active = $row['active'];
        $count = mysqli_num_rows($result);

        if($count==1) //email et mdp correct
        {
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $_SESSION['email'] = $nom;
            $_SESSION['prenom']=$prenom;
            header('Location: ../login.php');
        }else{
            header('Location: ../index.php?erreur=mdpouemailfaux');
        }
    }
    else{
        header('Location: ../index.php?erreur=vide');
    }
    
}
else{
    header('Location: ../index.php?erreur=none');
}
mysqli_close($db);

?>

