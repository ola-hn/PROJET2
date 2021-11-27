<?php
include "../signup/pdo.php";
include "../logout.php";
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
    $mdp = mysqli_real_escape_string($db, htmlspecialchars($_POST['mdp']));

    if($email !=="" && $mdp!==""){
        $requete = "SELECT id_utilisateur, nom, prenom, roles FROM utilisateur WHERE email = '$email' and mdp = '$mdp'";
        $result = mysqli_query($db, $requete);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$active = $row['active'];
        $count = mysqli_num_rows($result);

        if($count==1) //email et mdp correct
        {
            $id = $row['id_utilisateur'];
            $nom = $row['nom'];
            $role = $row['roles'];
            $prenom = $row['prenom'];
            $_SESSION['email'] = $nom;
            $_SESSION['prenom']=$prenom;
            $_SESSION['id']=$id;
            $_SESSION['roles']=$role;
            if($role=='E'){
                header('Location: ../login.php');
            }
            else{
                header('Location: ../tuteur.php');
            }
            
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

