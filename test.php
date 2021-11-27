<?php
$db = "sut";
$dbhost = "localhost";
$dbuser = "root";
$dbpasswrd = "";
$dbport = 3306;

$pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswrd);
$pdo->exec("SET CHARACTER SET utf8");

$stmt = $pdo->prepare("INSERT INTO utilisateur(roles, nom, prenom, email, mdp) VALUES(?,?,?,?,?);");
$roles = 'E';
$nom = 'Eto';
$prenom = 'Gar';
$email = 'test9@gmail.com';
$mdp = 'test';
//$stmt->bind_param('sssd', $roles, $nom, $prenom, $email, $mdp);
$stmt->bindParam(1,$roles);
$stmt->bindParam(2,$nom);
$stmt->bindParam(3,$prenom);
$stmt->bindParam(4,$email);
$stmt->bindParam(5,$mdp);

$stmt->execute();

$stmt = $pdo->prepare("SELECT * FROM utilisateur;");
$stmt->execute();
$res = $stmt->fetchAll();
echo '<h1>Liste des utilisateurs: </h1><br>';
foreach ($res as $row) {
    echo $row["roles"]." ".$row["nom"]."<br>";
}

$truc = $pdo->prepare("SELECT mdp FROM utilisateur WHERE email = '$email'");
echo $truc;
