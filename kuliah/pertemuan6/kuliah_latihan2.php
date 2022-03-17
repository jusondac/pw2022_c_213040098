<?php
  // Array assosiative
  // array yang indexnya string

  $mahasiswa = [
    [
      "nama" => "Muhammad Rejka Permana",
      "npm"=>'213040098',
      "email"=>'permanarejka@gmail.com',
      "jurusan"=>'Teknik Informatika'
    ],
    [
      "nama"=>"Muhammad Anggi Kusuma",
      "npm"=>'213040084',
      "email"=>'anggikusuma@gmail.com',
      "jurusan"=>'Teknik Informatika'
    ]
  ];

  // print_r($mahasiswa[0]['email'])
?>
<ul>
  <?php foreach($mahasiswa as $value){ ?>
    <li>Nama: <?php echo $value['nama'] ?></li>
    <li>NPM: <?php echo $value['npm'] ?></li>
    <li>Email: <?php echo $value['email'] ?></li>
    <li>Jurusan:<?php echo $value['jurusan'] ?></li>
    <br>
  <?php } ?>
</ul>
<!-- <?php foreach($mahasiswa as $mhs){ ?>
<ul>
  <?php foreach ($mhs as $key => $value) { ?>
    <li><?php echo ucfirst($key); ?>: <?php echo $value; ?></li>
  <?php } ?>
</ul>
<?php } ?> -->
