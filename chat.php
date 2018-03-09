<?php
// J'affiche les erreurs
ini_set('display_errors',1);
error_reporting(E_ALL);

// J'intialise une session
session_start();
// $_SESSION['login'] = $login;


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



if(isset($_POST['send'])){

  $options = array(
  'msg' 		        => FILTER_SANITIZE_STRING);
  $result = filter_input_array(INPUT_POST, $options);

    if(isset($_POST['msg']) && !empty($_POST['msg'])){
      $mess = $result['msg'];
      // j'envoie les valeurs du champ dans bdd
      $insertmess = $bdd-> query('INSERT INTO message(messages, user_ID) VALUES ("'.$mess.'", 10)')->fetch();

      }
   }


 ?>
<!DOCTYPE html>
<html>

<head>
  <title>Chat</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div>
    <section>
      <form action="" method="POST">
        <p>
          <label>
            <textarea name="chat" rows="30" cols="150" >
              <?php
              // j'affiche les messages
              $display=$bdd->query("SELECT * FROM message ORDER BY ID ASC");
              $msg=$display->fetchAll();
              foreach ($msg as $mess){
              echo $mess['messages'];
              }
              ?>
              <?php echo isset($msg['messages']);?>
            </textarea>
          <label>
        </p>
        <p>
          <label>
          <!--  <input type="text" name="login"> ajouter echo $ post var -->
            <input type="text" name="msg" placeholder="Enter your message" maxlength="100" >
            <input type="submit" value="Send" name="send">
          </label>
        </p>
      </form>
    </section>
  </div>



  <div>
    <section>
      <form action="index.php" method="POST">
        <input type="submit" value="log Out" name="log_out">
      </fieldset>
      </form>
    </section>
  </div>
</body>
</html>
