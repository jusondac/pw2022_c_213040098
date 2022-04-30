<?php
  // connection to database
  $connection = mysqli_connect("localhost","rejka","rejkapass","php_dasar");

  // ambil data fetch mahasiswa dari object result
  // mysqli_fetch_row()       => mengembalikan array numeric
  // mysqli_fetch_assoc()     => mengembalikan array associative
  // mysqli_fetch_array()     => mengembalikan array numeric dan associative
  // mysqli_fetch_object()    => mengembalikan object

  // test result here from command above
  // $list_mahasiswa = mysqli_fetch_array($result);
  // $list_mahasiswa = mysqli_fetch_assoc($result);
  // var_dump($list_mahasiswa);
?>