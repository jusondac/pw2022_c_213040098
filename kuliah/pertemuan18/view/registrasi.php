<?php
  require './../configuration/main_conf.php';
  require './../helper/application_helper.php';
  require './../model/users.php';
  session_start();

  if( isset($_SESSION["login"]) ){
    header('location: index.php');
    exit;
  }

  if( isset($_POST['register']) ){
    if( registrasi($_POST) > 0 ) {
      echo query_status_msg('User baru berhasil ditambahkan', 'index.php');
    } else {
      echo mysqli_error($connection);
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resgitrasi</title>
    <link rel="stylesheet" href="../assets/application.css.scss">
  </head>
  <body>
    <h1>Halaman Resgitrasi</h1>
    <div class="card">
      <form action="" method="post">
        <ul>
          <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" autocomplete="off">
          </li>
          <li>
            <label for="password">password</label>
            <input type="password" name="password" id="password" autocomplete="off">
          </li>
          <li>
            <label for="password_confirmation">password confirmation </label>
            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off">
          </li>
          <li>
            <button type="submit" name="register" class="success">Signup </button>
          </li>
        </ul>
      </form>
    </div>
  </body>
</html>
