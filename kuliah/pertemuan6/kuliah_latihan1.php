<?php
  // Array Numerik
  // array dengan index ber asosiasi dengan angka.

  $mahasiswa = [
    ["Muhammad Rejka Permana",'213040098',
    'permanarejka@gmail.com','Teknik Informatika'],
    ["Muhammad Anggi Kusuma",'213040084',
    'anggikusuma@gmail.com','Teknik Informatika']
  ];

  // print_r($mahasiswa[0][2])
  // var_dump($mahasiswa[0][2])

  // Array Associative
  // array dengan index ber asosiasi dengan string.
?>

<ul>
  <?php foreach($mahasiswa as $mhs){ ?>
    <li>Nama: <?php echo $mhs[0] ?></li>
    <li>NPM: <?php echo $mhs[1] ?></li>
    <li>Email: <?php echo $mhs[2] ?></li>
    <li>Jurusan:<?php echo $mhs[3] ?></li>
    <br>
  <?php } ?>
</ul>
