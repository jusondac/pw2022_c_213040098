<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);

  require 'functions.php';

  $id = $_GET['id'];
  $patient = query("SELECT p.nama, st.name as status, p.usia, p.email, p.gambar  from patients p join statuses st on p.status_id = st.id where p.id = $id")[0];
  $statuses = query("SELECT * FROM statuses");
  $diseases = query("SELECT d.name FROM patient_diseases pd join diseases d ON pd.diseases_id = d.id where pd.patient_id = 18");
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

    <div class="d-flex justify-content-around w-100">
      <div class="container w-100 h-100 text-white">
        <div class="row">
          <div class="col-md-4 d-flex flex-column align-items-center">
            <h1>Detail Patient</h1>
            <img src="img/<?php echo $patient['gambar'] ?>" alt="" class="image">
            <div class="mb-3 mt-5 d-grid gap-2 w-100">
              <a href="update_patients.php?id=<?php echo $id ?>" class="btn btn-primary box-shadow">edit</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-center align-items-end flex-column h-100 text-right">
              <h2 class="text-muted">Info</h2>
              <h5><?php echo $patient['nama'] ?></h5>
              <h5><?php echo $patient['usia'] ?> th</h5>
              <h5><?php echo $patient['email'] ?></h5>
              <h5><?php echo $patient['status'] ?></h5>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-center align-items-start flex-column h-100 text-right ps-4 border-start">
              <h2 class="text-muted">Diagnostik</h2>
              <?php foreach ($diseases as $key => $value): ?>
                <h5><?php echo $value['name'] ?></h5>
                <?php echo '<br >' ?>
              <?php endforeach; ?>
            <div>
          </div>
        </div>
        <!-- END OF ROW -->
      </form>
      </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>
