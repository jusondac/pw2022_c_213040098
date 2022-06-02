<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);

  require 'functions.php';

  $id = $_GET['id'];
  $patient = query("SELECT * FROM patients WHERE id = $id")[0];
  $statuses = query("SELECT * FROM statuses");
  $diseases = query("SELECT * FROM diseases");
  $patient_diseases = query("SELECT * FROM patient_diseases where patient_id = $id");

  if ( isset($_POST["save"]) ) {
    if ( ubah($_POST, $id) > 0 ) {
      echo "
        <script>
          alert('data berhasil diubah!');
          document.location.href = 'patients.php';
        </script>
      ";
    }
  }
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
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" name="old_gambar" value="<?= $patient["gambar"]; ?>">
            <div class="col-md-4 d-flex flex-column align-items-center">
              <img src="img/<?php echo $patient['gambar'] ?>" alt="" class="image">
              <div class="mb-3 mt-5 d-flex flex-column">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $patient["gambar"] ?>">
                <button type="submit" name="save" class="mt-4 btn btn-success box-shadow">Save</button>
              </div>
            </div>
            <div class="col-md-4">
              <h3 class="text-white mb-3">Update Data </h3>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="nama" placeholder="Masukan nama pasien" value="<?= $patient['nama'] ?>">
              </div>
              <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="usia" placeholder="Masukan umur pasien" value="<?php echo $patient["usia"] ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email pasien" value="<?php echo $patient["email"] ?>">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                  <?php foreach ($statuses as $key => $value): ?>
                    <option <?= ($patient["status_id"] == $value["id"]) ? "selected" : ""  ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <h3 class="">Diagnostik</h3>
              <div class="pt-3">
                <?php if (sizeof($patient_diseases)!=0) : ?>
                  <?php foreach ($patient_diseases as $key => $value_pd) : ?>
                    <div id="inputFormRow">
                      <div class="input-group mb-3 d-flex align-items-center">
                        <select id="status" name="disease[]" class="form-select">
                          <?php foreach ($diseases as $key => $value): ?>
                            <option <?php if ($value_pd['diseases_id'] === $value['id'] ) echo "selected" ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                          <?php endforeach ?>
                        </select>
                        <div class="input-group-append">
                          <button id="removeRow" type="button" class="btn btn-sm btn-danger ms-5 box-shadow">
                            <span class="material-icons-sharp">
                              close
                            </span>
                          </button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div id="inputFormRow">
                    <div class="input-group mb-3 d-flex align-items-center">
                      <select id="status" name="disease[]" class="form-select">
                        <?php foreach ($diseases as $key => $value): ?>
                          <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="input-group-append">
                        <button id="removeRow" type="button" class="btn btn-sm btn-danger ms-5 box-shadow">
                          <span class="material-icons-sharp">
                            close
                          </span>
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- END IF -->


                <!-- END OF SELECT -->
                <div id="newRow"></div>
                <button id="addRow" type="button" class=" box-shadow btn btn-primary">Add Row</button>
              </div>
            </div>
          </div>
        <!-- END OF ROW -->
        </form>
      </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $("#addRow").click(function () {
      var html = '';

      html += `<div id="inputFormRow">`;
      html +=   `<div class="input-group mb-3 d-flex align-items-center">`;
      html +=    `<select id="status" name="disease[]" class="form-select">`;
      html +=      `<?php foreach ($diseases as $key => $value): ?>`;
      html +=        `<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>`;
      html +=      `<?php endforeach ?>`;
      html +=    `</select>`;
      html +=    `<div class="input-group-append">`;
      html +=      `<button id="removeRow" type="button" class="btn btn-sm btn-danger ms-5 box-shadow">`;
      html +=        `<span class="material-icons-sharp">`;
      html +=          `close`;
      html +=        `</span>`;
      html +=      `</button>`;
      html +=    `</div>`;
      html +=  `</div>`;
      html +=`</div>`;
      $('#newRow').append(html);
   });

   // remove row
   $(document).on('click', '#removeRow', function () {
       $(this).closest('#inputFormRow').remove();
   });
  </script>
  </body>
</html>
