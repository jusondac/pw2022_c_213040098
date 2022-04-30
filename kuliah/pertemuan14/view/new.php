<?php
  require './../configuration/main_conf.php';
  require './../helper/application_helper.php';
  require './../model/mahasiswa.php';
  if ( isset($_POST["submit"]) ) {
    if ( anew($_POST) > 0 ) {
      echo query_status_msg("Data berhasil ditambahkan","index.php");
    } else {
      echo query_status_msg("Data gagal ditambahkan","index.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah mahasiswa</title>
  <link rel="stylesheet" href="../assets/application.css.scss">
</head>
<body>
  <h1>Tambah Mahasiswa</h1>
  <div class="card">

    <form action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" required>
        </li>
        <li>
          <label for="nrp">NRP</label>
          <input type="text" id="nrp" name="nrp" required>
        </li>
        <li>
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required>
        </li>
        <li>
          <label for="jurusan">Jurusan</label>
          <input type="text" id="jurusan" name="jurusan" required>
        </li>
        <li>
          <label for="gambar">Gambar</label>
          <input type="file" id="gambar" name="gambar" class="file-upload">
        </li>
        <li><Button class="success" type="submit" name="submit">Simpan</Button></li>
      </ul>
    </form>
  </div>
  <a href="index.php">Back</a>
</body>
</html>
