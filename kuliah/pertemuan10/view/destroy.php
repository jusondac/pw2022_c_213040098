<?php
  require './../configuration/main_conf.php';
  require './../model/mahasiswa.php';
  require './../helper/application_helper.php';

  $id = $_GET["id"];
  if( destroy($id) > 0) {
    echo query_status_msg("Data berhasil dihapus","index.php");
  } else {
    echo query_status_msg("Data gagal dihapus","index.php");
  }
?>