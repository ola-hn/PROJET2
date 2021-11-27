<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Inscription</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="./login/include.php" class="sign-in-form" method="post">
          <!--CONNEXION!!-->
          <h2 class="title">Connexion</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="mdp" placeholder="Mot de Passe" required/>
          </div>
          <input type="submit" name="submit" value="Se Connecter" class="btn solid" />
          <p class="social-text">Ou se connecter grâce à un reseau social</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>


        <form action="./signup/include.php" class="sign-up-form" method="post">
          <!--INSCRIPTION!!-->
          <h2 class="title">S'inscrire</h2>
          <div class="input-field optionss" id="wrapper">
            <input type="radio" name="role" value="E" id="option-1" checked>
            <input type="radio" name="role" value="T" id="option-2">
            <label for="option-1" class="option option-1">
              <div class="dot"></div>
              <span>Etudiant</span>
            </label>
            <label for="option-2" class="option option-2">
              <div class="dot"></div>
              <span>Tuteur</span>
            </label>
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="nom" placeholder="Nom" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="prenom" placeholder="Prénom" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="mdp" placeholder="Mot de passe" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="c_mdp" placeholder="Confirmer Mot de Passe" required/>
          </div>
          <input type="submit" name="submit" class="btn" value="S'inscrire" />
          <p class="social-text">Ou s'inscrire avec un réseau social</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Nouveau ici ?</h3>
          <p>
            Etudiant ou tuteur, besoin d'aide ou envie d'aider ? Juste inscris-toi !
          </p>
          <button class="btn transparent" id="sign-up-btn">
            S'inscrire
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Déja membre ?</h3>
          <p>
            Connecte-toi !
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Connexion
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>