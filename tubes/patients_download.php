<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

require 'functions.php';
require_once __DIR__.'/vendor/autoload.php';

$patients = query("SELECT p.id, p.gambar, p.nama, p.usia, p.email, st.name as status FROM patients p join statuses st on p.status_id = st.id ");

$mpdf = new \Mpdf\Mpdf([
  'tempDir' => '/opt/lampp/temp'
]);
$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset-"UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta nane="viewport" content="width-device-width, initial-scale-1.0">
    <title>Patient Management</title>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./assets/css/print.css">
  </head>
  <body>
    <table class="table-download">
      <thead>
        <tr>
          <th>gambar</th>
          <th>nama</th>
          <th>usia</th>
          <th>status</th>
          <th>email</th>
        </tr>
      </thead>
      <tbody>
        ';
foreach($patients as $value){
  $html .= '<tr>
    <td><img src="img/'.$value["gambar"].'"></td>
    <td>'.$value["nama"].'</td>
    <td>'.$value["usia"].'</td>
    <td>'.$value["status"].'</td>
    <td>'.$value["email"].'</td>
  </tr>';
}

$html .= '
      </tbody>
    </table>
  </body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output();

 ?>
