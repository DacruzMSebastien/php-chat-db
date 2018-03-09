<?php
// J'affiche les erreurs
ini_set('display_errors',1);
error_reporting(E_ALL);

// J'intialise une session
session_start();


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}




  // Si j'appuie sur sur Sign up ..
if(isset($_POST['submit_register'])){


  // SANITIZE
  $options = array(
    'create_login'    	=> FILTER_SANITIZE_STRING,
    'create_password' 	=> FILTER_SANITIZE_STRING,
    'confirm_password' => FILTER_SANITIZE_STRING,
    'email' 		        => FILTER_VALIDATE_EMAIL);
    $result = filter_input_array(INPUT_POST, $options);

  if(isset($_POST['create_login']) && isset($_POST['create_password']) && isset($_POST['confirm_password']) && isset($_POST['email'])){
   if(!empty($_POST['create_login']) && !empty($_POST['create_password']) && !empty($_POST['confirm_password']) && !empty($_POST['email'])){
      $login = htmlspecialchars($result['create_login']);
      $pw = htmlspecialchars($result['create_password']);
      $pw2 = htmlspecialchars($result['confirm_password']);
      $pass_hache = password_hash($pw, PASSWORD_DEFAULT);  // Je crypte le mot de passe
      $email = htmlspecialchars($result['email']);

        // Je vérifie si les 2 mdp sont identiques
      if(password_verify($pw2, $pass_hache)){
        $req = $bdd->query('INSERT INTO user(login, password, email) VALUES("'.$login.'", "'.$pass_hache.'","'.$email.'" )'); //  j'envoie les valeurs des champs dans la bdd
        $_SESSION['create_login'] = $login;
        $_SESSION['pass_hache'] = $pass_hache;
        $_SESSION['email'] = $email;

      } else {
          echo "Invalid password";
        }


      // On redirige vers index.php si tout est ok
        header("Location: index.php");

      }
    }
  }




// Vérif pseudo base de donnée, si existant -> choisir un autre
// validation email

 ?>


<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div>
    <section>
      <form action="" method="POST">
        <fieldset>
        <h1>Create a new account</h1>
        <p>
          <label>Choose a login
            <input type="text" name="create_login" placeholder="Enter your login" maxlength="50" required>
          </label>
        </p>
        <p>
          <label>Choose a password
            <input type="password" name="create_password" placeholder="Enter your password" maxlength="50" required>
          </label>
        </p>
        <p>
            <label>Confirm your Password
              <input type="password" name="confirm_password" placeholder="Confirm your password" maxlength="50" required>
            </label>
            <!-- <?php if ($verif_pw == 'pok'){
             echo '<span class="error">Invalid password</span>';
           }?> -->
        </p>
        <p>
          <label>Enter a valid e-mail
            <input type="text" name="email" placeholder="Enter your email" maxlength="50" required>
          </label>

        </p>

        <input type="submit" value="Sign up" name="submit_register">
      </fieldset>
      </form>
    </section>
  </div>
</body>
</html>
