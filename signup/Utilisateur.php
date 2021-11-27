<?php
class Utilisateur extends Dbh
{
    private $roles;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $c_mdp;

    public function __construct($roles, $nom, $prenom, $email, $mdp, $c_mdp)
    {
        $this->roles = $roles;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->c_mdp = $c_mdp;
    }

    //Entre les données de l'utilisateur dans la base
    public function setUser($roles, $nom, $prenom, $email, $mdp)
    {
        $stmt = $this->connect()->prepare("INSERT INTO utilisateur(roles, nom, prenom, email, mdp) VALUES(?,?,?,?,?);");

        //$cacheMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $stmt->execute(array($roles, $nom, $prenom, $email, $mdp));
        /*
        if ($stmt->execute(array($roles, $nom, $prenom, $email, $cacheMdp))==null) {
            $stmt = null;
            header("location: .../index.php?error=stmtfailed");
            exit();
        }
        */
    }

    public function loginUser($email, $mdp){
        $b = $this->checkUser($this->email);
        if(!$b){
            header("location: ../index.php?error=REGISTERFIRST");
        }
        else{
            $stmt = $this->connect()->prepare("SELECT mdp FROM utilisateur WHERE email = '$email'");
            echo $stmt;
        }
        
    }

    //Regarde si l'email existe déja dans la base de donnée
    public function checkUser($email)
    {
        $resultCheck=true;
        $stmt = $this->connect()->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $res = $stmt->rowCount();
        if ($res>0) {
            $resultCheck = false;
        }
    
        return $resultCheck;
    }



    //Vérifie la bonne syntaxe des données
    public function signupUser(){
        //input vide 
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            echo "case vide !";
            exit();
        }
        //Caractère spéciaux ?
        if ($this->invalidNom() == false) {
            echo "Caractère non conforme";
            header("location: ../index.php?error=nom");
            
            exit();
        }
        //Caractère spéciaux ?
        if ($this->invalidPrenom() == false) {
            header("location: ../index.php?error=prenom");
            echo "Caractère non conforme";
            exit();
        }
        //Syntaxe du mail
        /* 
        if ($this->invalidEmail() == false) {
            header("location : ../index.php?error=emailsyntaxe");
            exit();
        }
        */
        //Mail déjà existant?
        if ($this->userExist() == false) {
            header("location: ../index.php?error=emailtaken");
            echo "Caractère non conforme";
            exit();
        }
        //confirmation mdp
        if ($this->confirmerMDP() == false) {
            echo "Pas de correspondance";
            header("location: ../index.php?error=wrongpassword");
            
            exit();
        }
        //Rentre les données dans la base
        $this->setUser($this->roles, $this->nom, $this->prenom, $this->email, $this->mdp);
    }

    private function emptyInput(){
        $result=true;
        if(empty($this->nom) || empty($this->prenom) || empty($this->email) || empty($this->mdp) || empty($this->c_mdp)){
            $result = false;
        }
        return $result;
    }

    private function invalidNom(){
        $result=true;
        if(!preg_match("/^([a-zA-Z' ]+)$/", $this->nom))
        {
            $result = false;
        }
        return $result;
    }

    private function invalidPrenom(){
        $result=true;
        if(!preg_match("/^([a-zA-Z' ]+)$/", $this->prenom))
        {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail(){
        //Ola
    }

    private function confirmerMDP(){
        $result=true; 
        if($this->mdp !== $this->c_mdp){
            $result = false;
        }
        return $result;
    }

    private function userExist(){
        $result=true; 
        if(!$this->checkUser($this->email)){
            $result = false;
        }
        return $result;
    }
}
