<?php
session_start();
if (isset($_SESSION['iduser'])) {
  header('location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Login</title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="auth.php" method="post">
        <div class="input-group">
          <label for="username">username</label>
          <input type="text" name="username" id="username" class="username" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
        </div>

        <div class="input-group">
          <label for="password">password</label>
          <input type="password" name="password" id="password" class="password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
        </div>

        <div class="erreur">
          <?php
          if (isset($_GET['err'])) {
            if ($_GET['err'] == 1) {
              echo "Veuillez saisir un login correct.";
            } else {
              echo "Le mot de passe ne correspond pas au login saisi.";
            }
          }
          ?>
        </div>
        <div class="input-group">
          <label for="rememberMe">Remember me</label>
          <input type="checkbox" name="rememberMe" id="rememberMe" value="1" checked>
        </div>
        <div class="input-group">
          <button>Login</button>
        </div>
        <a href="">Create account?</a>
      </form>
    </div>
  </main>
</body>

</html>