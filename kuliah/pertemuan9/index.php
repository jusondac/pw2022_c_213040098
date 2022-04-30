<?php
  require './configuration/main_conf.php';
  require './model/mahasiswa.php';
  $i = 1;
  $mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mahasiswa</title>
  </head>
  <body>
    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Nrp</th>
          <th>Email</th>
          <th>Jurusan</th>
          <th colspan=2>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($mahasiswa as $row): ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['npm'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['jurusan'] ?></td>
          <td>Ubah</td>
          <td>Hapus</td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
