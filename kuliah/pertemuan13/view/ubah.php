<?php
  require './../configuration/main_conf.php';
  require './../model/mahasiswa.php';
  require './../helper/application_helper.php';
  $id = $_GET["id"];
  $mahasiswa = index("SELECT * FROM mahasiswa WHERE id=$id")[0];
  if ( isset($_POST["submit"]) ) {
    if ( update($_POST, $id) > 0 ) {
      echo query_status_msg("Data berhasil diubah","index.php");
    } else {
      echo query_status_msg("Data gagal diubah","index.php");
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
  <h1>Update Mahasiswa</h1>
  <div class="card card-update">
    <div class="image">
      <img src="../img/<?=$mahasiswa['gambar']?>">
    </div>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_gambar" value="<?= $mahasiswa["gambar"]; ?>">
      <ul>
        <li>
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" required value="<?= $mahasiswa['name']?>">
        </li>
        <li>
          <label for="nrp">NRP</label>
          <input type="text" id="nrp" name="nrp" required value="<?= $mahasiswa['npm']?>">
        </li>
        <li>
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required value="<?= $mahasiswa['email']?>">
        </li>
        <li>
          <label for="jurusan">Jurusan</label>
          <input type="text" id="jurusan" name="jurusan" required value="<?= $mahasiswa['jurusan']?>">
        </li>
        <li>
          <label for="gambar">Gambar</label>
          <input type="file" id="gambar" name="gambar">
        </li>
        <li><Button class="success" type="submit" name="submit">Update</Button></li>
      </ul>
    </form>
  </div>
  <a href="index.php">Back</a>
</body>
</html>
