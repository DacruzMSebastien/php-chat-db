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
      <form action="chat.php" method="POST">
        <h1>Mini-chat</h1>
        <p>
        <label>Login
          <input type="text" name="login" placeholder="Enter your login" maxlength="50" required>
        </label>
        </p>
        <p>
        <label>Password
          <input type="text" name="password" placeholder="Enter your password" maxlength="50" required><br/>
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
