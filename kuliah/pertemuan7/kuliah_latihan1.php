<?php
  // SUPERGLOBAL
  // Variable milik PHP yang bisa kita gunakan
  // bentuk dari hasil get tersebut yaitu Array Associative
  // semua variable global memiliki nilai Array Associatice
  // $_GET
  // $_POST
  // $_SERVER
  // ...
  // var_dump($_POST);
  // echo '<br>';
  // var_dump($_GET);
  $nama = $_GET['nama'];
?>
<h1>ma hommie <?= echo $_nama; ?></h1>
<ul>
  <li>
    <a href="?nama=rejka">Rejka</a>
  </li>
  <li>
    <a href="?nama=dude">Dude</a>
  </li>
</ul>
