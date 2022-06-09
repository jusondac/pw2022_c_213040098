<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);
  require 'functions.php';

	session_start();

	$id = $_SESSION['id'];
	$user = query("SELECT * FROM users WHERE id = $id")[0];

  $per_page = 5;
  $step_page = 10;
  $all_data_count = mysqli_num_rows(just_query("SELECT * FROM patients"));

  $step_count = ceil($all_data_count / $step_page);
  $current_step = isset($_GET['p']) ? $_GET['p'] : 1;

  $page_count = ceil($all_data_count / $per_page);
  $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
  $start_data = ( $per_page * $current_page ) - $per_page;

  $patients = query("SELECT p.id, p.nama, p.usia, p.email, st.name as status FROM patients p join statuses st on p.status_id = st.id  LIMIT $start_data, $per_page");
  $total_patients = count(query("SELECT * from patients"));
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
    <script src="assets/js/script.js" defer></script>
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
      <div class="main d-flex flex-column w-100">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="text-white m-4">List Patient</h3>
          <form class="d-flex" action="" method="get">
            <input type="text" class="form-control me-5" name="keyword" id="keyword" placeholder="cari..">
          </form>
					<?php if((int)$user['role'] === 2): ?>
	          <a href="./new_patients.php" class="btn btn-warning text-white me-5 box-shadow">baru</a>
					<?php endif ?>
        </div>
        <div class="main-table" id="main-table">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th>name</th>
                <th>usia</th>
                <th>status</th>
                <th colspan="3">aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($patients as $key => $value): ?>
              <tr>
                <td><?php echo $value['nama'] ?></td>
                <td><?php echo $value['usia'] ?></td>
                <td><?php echo $value['status'] ?></td>
								<?php if((int)$user['role'] === 2): ?>
                <td  style="width: 3rem">
                  <a href="update_patients.php?id=<?= $value['id'] ?>"  class="btn btn-success d-flex align-items-center justify-content-center box-shadow">
                    <span class="material-icons-sharp">edit</span>
                  </a>
                </td>
                <td  style="width: 3rem">
                  <a href="hapus_patients.php?id=<?= $value['id'] ?>"  class="btn btn-danger d-flex align-items-center justify-content-center box-shadow">
                    <span class="material-icons-sharp">delete</span>
                  </a>
                </td>
								<?php endif ?>
                <td  style="width: 3rem">
                  <a href="detail_patient.php?id=<?= $value['id'] ?>"  class="btn btn-primary d-flex align-items-center justify-content-center box-shadow">
                    <span class="material-icons-sharp">visibility</span>
                  </a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <div class="d-flex justify-content-center mt-5">
            <ul class="pagination">
              <?php if( $current_page > 1 ): ?>
                <li class="page-item ">
                  <a href="?p=<?= $current_page - 1 ?>" class="box-shadow me-3 bg-success text-white page-link">&lt;</a>
                </li>
              <?php endif; ?>
              <?php for($page=1;$page<=$page_count;$page++): ?>
                <li class="page-item ">
                  <a href="?p=<?= $page ?>" class="page-link bg-primary border-none box-shadow text-white <?= ($current_page == $page) ? "bg-success":""; ?>"><?= $page ?></a>
                </li>
              <?php endfor; ?>
              <?php if( $current_page < $page_count ): ?>
                <li class="page-item ">
                  <a href="?p=<?= $current_page + 1 ?>" class="page-link bg-success ms-3 box-shadow text-white">&gt;</a>
                </li>
              <?php endif; ?>
            </ul>
            <!-- <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> -->
          </div>
        </div>
      </div>
      <div class="right d-flex flex-column h-100 mt-5 pt-5">
        <div class="right-table w-100 d-flex justify-content-center flex-column">
          <div class="card box-shadow bg-primary text-white">
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-between">
                <span class="text">Total</span>
                <span class="material-icons-sharp text-white">info</span>
              </h5>
              <h6 class="card-subtitle mb-2">Total jumlah pasien</h6>
              <div class="card-text d-flex">
                <h2><?php echo $total_patients ?></h2>
              </div>
            </div>
          </div>
          <a href="patients_download" class="btn btn-success mt-5 me-5 box-shadow d-flex align-items-center justify-content-center">
            <span class="material-icons-sharp">
              download
            </span>
            Download PDF patients
          </a>
        </div>
        <!-- END OF RIGHT TABLE -->
      </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
