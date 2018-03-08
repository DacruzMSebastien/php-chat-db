<?php
// J'affiche les erreurs
ini_set('display_errors',1);
error_reporting(E_ALL);

// J'intialise une session
session_start();
$_SESSION['msg']= isset($_POST['msg']);


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


if(isset($_POST['send'])){
  
    if(isset($_POST['msg']) && !empty($_POST['msg'])){
      $mess = htmlspecialchars($_POST['msg']);

      $insertmess = $bdd->prepare('INSERT INTO message(messages) VALUES ("'.$mess.'")');
      $insertmess->execute(array(
        'messages' => $mess,
      ));





          }
      }
// $login = $_POST['login'];
// $password = $_POST['password']



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
        <p>
          <label>
            <input type="text" name="msg" placeholder="Enter your message" maxlength="200" required>
            <input type="submit" value="Send" name="send">
          </label>
        </p>



  <div>
    <section>
      <form action="index" method="POST">
        <input type="submit" value="log Out" name="log_out">
      </fieldset>
      </form>
    </section>
  </div>
</body>
</html>
