<?php
  require './../configuration/main_conf.php';
  require './../model/mahasiswa.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="../assets/application.css.scss">
  </head>
  <body>
    <table>
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
        <?php foreach($all_mahasiswa as $row): ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['npm'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['jurusan'] ?></td>
          <td><a class="success" href="ubah.php?id=<?= $row["id"]?>">Ubah</a></td>
          <td><a class="danger" href="destroy.php?id=<?= $row["id"]?>">Hapus</a></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a class="btn success" href="new.php">Tambah Mahasiswa</a>
  </body>
</html>
