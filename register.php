<?php
$sign_up = $_POST['sign_up'];

 ?>

Inscris toi et bicrave ce genre de drogue douce mamène

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
      <form action="index.php" method="POST">
        <fieldset>
        <h1>Create a new account</h1>
        <p>
        <label>Choose a login
          <input type="text" name="create_login" placeholder="Enter your login" maxlength="50" required>
        </label>
        </p>
        <p>
        <label>Choose a password
          <input type="text" name="create_password" placeholder="Enter your password" maxlength="50" required>
        </label>
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
