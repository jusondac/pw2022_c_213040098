<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);
  require 'functions.php';

  session_start();

  if( !isset($_SESSION["login"]) ){
    header('location: signin_signup.php');
    exit;
  }

  require './model/application_model.php';
  require './model/patient.php';
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

    <div class="d-flex justify-content-around ">
      <div class="main d-flex flex-column">
        <div class="w-100 pl-3 ps-4 pe-4 pb-4">
          <?php $total = count($patient->all()) ?>
          <?php [$injured_percentage, $on_medic_percentage, $recover_percentage] = $patient->percentage() ?>
          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $injured_percentage ?>%" aria-valuenow="<?php echo $injured['total'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total ?>"></div>
            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $on_medic_percentage ?>%" aria-valuenow="<?php echo $on_medic['total'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total ?>"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $recover_percentage ?>%" aria-valuenow="<?php echo $recover['total'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total ?>"></div>
          </div>
        </div>
        <!-- END OF PROGRESS -->
        <?php [$injured, $on_medic, $recover] = $patient->value_from_status() ?>
        <div class="d-flex justify-content-around w-100">
          <div class="card box-shadow bg-primary text-white">
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-between">
                <span class="text" style="--bg: var(--color-danger)">Terluka</span>
                <span class="material-icons-sharp">report</span>
              </h5>
              <h6 class="card-subtitle mb-2">Pasien yang terluka</h6>
              <div class="card-text d-flex">
                <h2><?php echo $injured['total'] ?></h2>
              </div>
            </div>
          </div>
          <div class="card box-shadow bg-primary text-white">
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-between">
                <span class="text" style="--bg: var(--color-warning)">pengobatan</span>
                <span class="material-icons-sharp">medical_services</span>
              </h5>
              <h6 class="card-subtitle mb-2">Pasien dalam pengobatan</h6>
              <div class="card-text d-flex">
                <h2><?php echo $on_medic['total'] ?></h2>
              </div>
            </div>
          </div>
          <div class="card box-shadow bg-primary text-white">
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-between">
                <span class="text" style="--bg: var(--color-success)">Sembuh</span>
                <span class="material-icons-sharp">health_and_safety</span>
              </h5>
              <h6 class="card-subtitle mb-2">Pasien Sembuh</h6>
              <div class="card-text d-flex justify-content-center align-items-center h-50">
                <h2><?php echo $recover['total'] ?></h2>
              </div>
            </div>
          </div>
        </div>
        <!-- END OF CARD -->
        <div class="main-bottom">
          <?php
            $diseases = query("SELECT ds.name, count(*) total
            from patient_diseases pd
            join diseases ds
            on ds.id = pd.diseases_id
            group by pd.diseases_id");
            $diseases_popular = [];$i = 0;
            // var_dump($disease);
            $diseases_popular['name'] = $diseases[0]['name'];
            $diseases_popular['total'] = $diseases[0]['total'];
            foreach ($diseases as $disease) {
              if ( $disease['total'] > $diseases_popular['total'] ){
                $diseases_popular['name'] = $diseases[0]['name'];
                $diseases_popular['total'] = $diseases[0]['total'];
              }
            }
          ?>
          <div>
            <h4>Penyakit yang sedang populer</h4>
            <h1><?php echo ucfirst($diseases_popular['name']) ?></h1>
          </div>
          <img src="assets/image/disease.png" alt="">
        </div>
      </div>
      <div class="right d-flex flex-column">
        <div class="right-table">
          <h3 class="text-white">Latest Patient</h3>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Age</th>
              </tr>
            </thead>
            <tbody>
              <?php $newest_patients = query("SELECT * from patients order by id DESC limit 4") ?>
              <?php foreach ($newest_patients as $key => $value): ?>
              <tr>
                <td><?php echo $value['nama'] ?></td>
                <td><?php echo $value['usia'] ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- END OF RIGHT TABLE -->
        <div class="d-grid gap-2 ps-3 pe-4 pt-5 right-bottom">
          <a href="#" class="btn btn-primary d-flex justify-content-between align-items-center box-shadow">
            Update status
            <span class="material-icons-sharp">update</span>
          </a>
          <a href="#" class="btn btn-warning text-white d-flex justify-content-between align-items-center box-shadow">
            see activity
            <span class="material-icons-sharp">trending_up</span>
          </a>
          <a href="#" class="btn btn-secondary bg-success d-flex justify-content-between align-items-center box-shadow">
            add new
            <span class="material-icons-sharp">send</span>
          </a>
        </div>
      </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
