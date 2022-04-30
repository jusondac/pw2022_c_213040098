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

  function anew($params) {
    [$nama, $npm, $email,$jurusan] = set_params($params);
    $query = "INSERT INTO mahasiswa (name, npm, email, jurusan)
      VALUES ('$nama','$npm','$email','$jurusan')";
    return query($query);
  }

  function update($params, $id) {
    [$nama, $npm, $email,$jurusan] = set_params($params);
    $query = "UPDATE mahasiswa SET
      npm = '$npm',
      name = '$nama',
      email = '$email',
      jurusan = '$jurusan'
      WHERE id = $id ";
    return query($query);
  }

  function destroy($params) {
    global $connection;
    $query = "DELETE FROM mahasiswa WHERE id = $params";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
  }
  
  $all_mahasiswa = index("SELECT * FROM mahasiswa");
  $i = 1;
?>