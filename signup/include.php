<?php
session_start();
if (isset($_POST["submit"])) { //set button

    $roles = $_POST["role"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $c_mdp = $_POST["c_mdp"];

    //instantiate signup cntr
    include "./pdo.php";
    include "./Utilisateur.php";
    $utilisateur = new Utilisateur($roles, $nom, $prenom, $email, $mdp, $c_mdp);

    $utilisateur->signupUser();

    header("location: ../login.php?erro=none");
}
