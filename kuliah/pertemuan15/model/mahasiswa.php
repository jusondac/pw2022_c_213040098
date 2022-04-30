<?php
  function index($query) {
    global $connection;
    $result = mysqli_query($connection, $query); $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

  function query($query) {
    global $connection;
    $send_params = mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
  }

  function set_params($params){
    $arr = [];
    foreach($params as $key => $value){
      if($key == "submit"){
        break;
      } else {
        $arr[] = htmlspecialchars($value);
      }
    }
    return $arr;
  }

  function upload() {
    $file = $_FILES['gambar'];
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_tmp = $file['tmp_name'];
    // image validation
    // validation that image is exist
    if( $file_error === 4){
      echo query_status_msg("Pilih Gambar Terlebih Dahulu","new.php");
      return false;
    }
    // validation that image has allowed type extention
    $valid_extention = ['jpg','jpeg','png'];
    $file_extention = explode('.', $file_name);
    $file_extention = strtolower(end($file_extention));
    if( !in_array($file_extention, $valid_extention) ){
      echo query_status_msg("Yang anda masukan bukan gambar","new.php");
      return false;
    }
    // validation that image has allowed size
    if( $file_size > 1000000 ) {
      echo query_status_msg("Ukuran Gambar terlalu besar","new.php");
      return false;
    }
    // change image name into uniq
    $file_name_new = uniqid();
    $file_name_new .= '.';
    $file_name_new .= $file_extention;
    // image already to upload
    move_uploaded_file($file_tmp, './../img/'.$file_name_new);
    return $file_name_new;
  }

  function anew($params) {
    [$nama, $npm, $email,$jurusan] = set_params($params);
    // upload gambar
    $gambar = upload();
    if ( !$gambar ){
      return false;
    }

    $query = "INSERT INTO mahasiswa (name, npm, email, jurusan,gambar)
      VALUES ('$nama','$npm','$email','$jurusan','$gambar')";
    return query($query);
  }

  function update($params, $id) {
    $old_gambar     = htmlspecialchars($params['old_gambar']);
    $nama           = htmlspecialchars($params['nama']);
    $npm            = htmlspecialchars($params['nrp']);
    $email          = htmlspecialchars($params['email']);
    $jurusan        = htmlspecialchars($params['jurusan']);
    // Image validation
    // var_dump($_FILES);die();
    if( $_FILES['gambar']['error'] === 4 ){
      $gambar = $old_gambar;
    } else {
      $gambar = upload();
    }
    $query = "UPDATE mahasiswa SET
      npm       = '$npm',
      name      = '$nama',
      email     = '$email',
      jurusan   = '$jurusan',
      gambar    = '$gambar'
      WHERE id  = $id ";
    return query($query);
  }

  function destroy($params) {
    global $connection;
    $query = "DELETE FROM mahasiswa WHERE id = $params";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
  }

  $i = 1;

  function search($keyword) {
    $query = "SELECT * FROM mahasiswa WHERE
                name    LIKE '%$keyword%' OR
                npm     LIKE '%$keyword%' OR
                email   LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";
    return index($query);
  }
?>
