<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);
  require './model/application_model.php';
  require './model/patient.php';
  require 'functions.php';

  session_start();

  if( !isset($_SESSION["login"]) ){
    header('location: signin_signup.php');
    exit;
  }

  $id = $_SESSION['id'];
	$user = query("SELECT * FROM users WHERE id = $id")[0];

  $patient = new Patient();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset-"UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta nane="viewport" content="width-device-width, initial-scale-1.0">
    <title>Patient Management</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./assets/css/custom.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light text-white mb-3">
      <div class="container-fluid">
        <div class="navbar-brand" href="#">
          <img src="assets/image/hospital_logo.png" class="brand-logo" alt="">
          <h2>Hospital</h2>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ps-5 me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./index.php">
                <span class="material-icons-sharp">house</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./patients.php">
                <span class="material-icons-sharp">group</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./statistics.php">
                <span class="material-icons-sharp">show_chart</span>
              </a>
            </li>
          </ul>
          <span class="navbar-text me-5">
            <a class="nav-link" href="logout.php">
              <span class="material-icons-sharp">logout</span>
            </a>
          </span>
        </div>
      </div>
    </nav>
    <!-- END OF NAVBAR -->

    <div class="d-flex justify-content-around flex-column align-items-center">
      <div class="w-75 h-75 bg-primary box-shadow  p-5 text-white border-radius-3">
        <h1>Coming Soon</h1>
        <h6>Donasi untuk meningkatkan kinerja developer :)</h6>
      </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
