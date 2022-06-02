<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);
  require './model/application_model.php';
  require './model/patient.php';

  $patient = new Patient();

  if( isset($_GET['id']) ){
    if ($patient->destroy($_GET['id']) > 0) {
      echo "
        <script>
          alert('data berhasil dihapus!');
          document.location.href = 'patients.php';
        </script>
      ";
    }
  }
?>
