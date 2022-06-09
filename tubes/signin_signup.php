<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);

  require 'functions.php';
  session_start();

  if( isset($_SESSION["login"]) ){
    header('location: index.php');
    exit;
  }

  if( isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' ){
    $id   = $_COOKIE['id'];
    $key  = $_COOKIE['key'];

    $result   = query("SELECT username FROM users WHERE id = $id");
    $row      = mysqli_fetch_assoc($result);
    if( $key === hash('sha256',$row['username']) ){
      $_SESSION['login'] = true;
    }
  }

  if( isset($_POST['login']) ) {
    $conn = koneksi();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_existed = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if( mysqli_num_rows($username_existed) === 1 ){
      $row = mysqli_fetch_assoc($username_existed);
      if( password_verify($password, $row['password']) ){
        $_SESSION["login"] 	= true;
				$_SESSION["id"] 		=	$row['id'];
        header("Location: index.php");
        exit;
      }
    }

    $error = true;
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/custom.css">
    <title>Sign in & Sign up Form</title>
    <script src="assets/js/login.js" defer></script>
  </head>
  <body>
    <div class="container-login">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" class="login sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" class="input-login" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <button type="submit" name="login" class="btn-login solid">Login</button>
          </form>
          <form action="" method="post" class="login sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" class="input-login" placeholder="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" />
            </div>
            <button type="submit" name="register"  class="btn-login"> Daftar</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum punya akun?</h3>
            <p>
              Segera daftarkan diri anda untuk segera kami periksa. Kami akan membantu anda
              untuk menangani keluah terkait kesehatan yang anda rasakan
            </p>
            <button class="btn-login transparent" id="sign-up-btn">
              Daftar
            </button>
          </div>
          <img src="img/model/undraw_doctors_hwty.svg" class="login-image" alt="" />
        </div>

        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah punya akun ?</h3>
            <p>
              Ayo segera cek kesehatan anda sebelum terlambat!.
            </p>
            <button class="btn-login transparent" id="sign-in-btn">
              Masuk
            </button>
          </div>
          <img src="img/model/undraw_medicine_b-1-ol.svg" class="login-image" alt="" />
        </div>
      </div>
    </div>

  </body>
</html>
