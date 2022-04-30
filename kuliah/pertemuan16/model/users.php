<?php
  function query($query){
    global $connection;
    return mysqli_query($connection, $query);
  }

  function validation($condition, $message, $page){
    if( $condition ){
      echo query_status_msg($message, $page);
      return false;
    } else {
      return true;
    }
  }

  function registrasi($data){
    global $connection;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($connection, $data['password']);
    $password_confirmation = mysqli_real_escape_string($connection, $data['password_confirmation']);
    $username_existed = query("SELECT username FROM users WHERE username = '$username'");
    // validation of checking that username has been used by someone out there
    validation(mysqli_fetch_assoc($username_existed),"Username telah Terdaftar","");
    // validation of checking that password and the confirmation are matched
    validation($password !== $password_confirmation,"Password tidak sesuai","");
    // turn password from UTF-8 into Hash by PHP Default
    $password = password_hash($password, PASSWORD_DEFAULT);
    query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    return mysqli_affected_rows($connection);
  }
?>
