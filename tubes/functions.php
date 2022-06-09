<?php
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);


// KONEKSI
function koneksi() {
  $conn = mysqli_connect('localhost','rejka','rejkapass','hospital') or die('KONEKSI GAGAL');
  return $conn;
}

// QUERY STATUS MESSAGE
function query_status_msg($message, $location){
  return "<script>
    alert('$message');
    document.location.href = '$location';
  </script>";
}

function validation($condition, $message, $page){
  if( $condition ){
    echo query_status_msg($message, $page);
    return false;
  } else {
    return true;
  }
}

// REGISTRASI
function registrasi($data){
  $conn = koneksi();

  $username = strtolower(stripslashes($data['username']));
  $password = mysqli_real_escape_string($conn, $data['password']);
  $password_confirmation = mysqli_real_escape_string($conn, $data['password_confirmation']);
  $username_existed = just_query("SELECT username FROM users WHERE username = '$username'");
  // validation of checking that username has been used by someone out there
  validation(mysqli_fetch_assoc($username_existed),"Username telah Terdaftar","");
  // validation of checking that password and the confirmation are matched
  validation($password !== $password_confirmation,"Password tidak sesuai","");
  // turn password from UTF-8 into Hash by PHP Default
  $password = password_hash($password, PASSWORD_DEFAULT);

	// 1 = user
	// 2 = admin
  $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 1)";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// QUERY
function query($query) {
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $rows = [];while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  } return $rows;
}

// JUST QUERY
function just_query($query){
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  return $result;
}

// UPDATE DATA
function ubah($data, $id){
  $conn = koneksi();
  $old_gambar = htmlspecialchars($data['old_gambar']);
  $nama = htmlspecialchars($data['nama']);
  $usia = htmlspecialchars($data['usia']);
  $email = htmlspecialchars($data['email']);
  $status_id = htmlspecialchars($data['status']);
  $result_affected = 0;
  if( $_FILES['gambar']['error'] === 4 ){
    $gambar = $old_gambar;
  } else {
    $gambar = upload();
  }

  $sql_disease_delete = "DELETE FROM patient_diseases where patient_id = $id";

  $result_affected += mysqli_query($conn, $sql_disease_delete);
  foreach ($data['disease'] as $key => $value) {
    $sql_disease = "INSERT INTO patient_diseases VALUES (null, $id, $value)";
    $result_affected += mysqli_query($conn, $sql_disease);
  }
  $sql_patient = "UPDATE patients SET
  nama = '$nama',
  usia = '$usia',
  email = '$email',
  status_id = $status_id,
  gambar = '$gambar'
  WHERE id = $id";
  $result_affected += mysqli_query($conn, $sql_patient);

  return $result_affected;
}

// HAPUS DATA
function hapus($id){
  $conn = koneksi();
  $sql = "DELETE FROM mahasiswa WHERE id = $id";
  mysqli_query($conn, $sql) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// UPLOAD DATA
function upload(){
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
  move_uploaded_file($file_tmp, './img/'.$file_name_new);
  return $file_name_new;
}

function tambah($data) {
  $conn = koneksi();
  $gambar = upload();
  if ( !$gambar ){
    return false;
  }

  $nama = htmlspecialchars($data['nama']);
  $usia = htmlspecialchars($data['usia']);
  $email = htmlspecialchars($data['email']);
  $status_id = htmlspecialchars($data['status_id']);
  $sql = "
    INSERT INTO patients
    VALUES (
      null,'$nama','$usia','$gambar','$email','$status_id'
    )";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
