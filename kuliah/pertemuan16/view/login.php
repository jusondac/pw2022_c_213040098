<?php
  require './../configuration/main_conf.php';
  require './../helper/application_helper.php';
  require './../model/users.php';

  session_start();

  if( isset($_SESSION["login"]) ){
    header('location: index.php');
    exit;
  }

  if( isset($_POST['login']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_existed = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");
    if( mysqli_num_rows($username_existed) === 1 ){
      $row = mysqli_fetch_assoc($username_existed);
      // echo password_verify($password, $row['password']); die();
      if( password_verify($password, $row['password']) ){
        $_SESSION["login"] = true;
        header("Location: index.php");
        exit;
      }
    }

    $error = true;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../assets/application.css.scss">
  </head>
  <body>
    <h1>Halaman Login</h1>
    <div class="card">
      <?php if( isset($error) ): ?>
        <p>Username atau password salah</p>
      <?php endif; ?>
      <form action="" method="post">
        <ul>
          <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
          </li>
          <li>
            <label for="password">Passwowrd</label>
            <input type="password" name="password" id="password">
          </li>
          <li><button type="submit" class="success" name="login">Login</button></li>
        </ul>
      </form>
    </div>
  </body>
</html>
