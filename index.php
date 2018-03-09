<?php
session_start();
 $_SESSION['create_login'] = $_POST['login'];
$_SESSION['pass_hache'] = $_POST['password'];
// $_POST['password'] = $pass_hache;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



if(isset($_POST['submit'])){

  // SANITIZE
  // $options = array(
  //   'login'    	=> FILTER_SANITIZE_STRING,
  //   'password' 	=> FILTER_SANITIZE_STRING);
  //   $result = filter_input_array(INPUT_POST, $options);

  if(isset($_POST['login']) && isset($_POST['password'])){
    if(!empty($_POST['login']) && !empty($_POST['password'])){

      $_POST['pass_hache'] = $pass;

// Je vérifie avec une requête si le champ login existent dans la base de donnée
  $connect = $bdd->query('SELECT COUNT(*) FROM user WHERE login="'.$_SESSION['create_login'].'" ')->fetch();
  if ($connect['COUNT(*)'] == 1){
    // echo $_SESSION['pass_hache'];
    header("Location: chat.php");
  } else {
    echo "Wrong login";
  }


      }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Php minichat</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div>
    <section>
      <form action="" method="POST">
        <h1>Mini-chat</h1>
        <p>
        <label>Login
          <input type="text" name="login" placeholder="Enter your login" maxlength="50" required>
        </label>
        </p>
        <p>
        <label>Password
          <input type="password" name="password" placeholder="Enter your password" maxlength="50" required><br/>
        </label>
        </p>
        <input type="submit" value="Log on" name="submit">
      </form>
    </section>
  </div>

  <div>
    <section>
      <form action="register.php" method="POST">
        <input type="submit" value="Sign Up" name="sign_up">
    </section>
    </form>
  </div>
</body>

</html>
