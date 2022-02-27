<?php

// Pengulangan For

echo "<h2>Pengulangan 1 - 10</h2>"
for($i=1;$i<=10;$i++){
  echo $i."<br/>";
}

// Pengulangan while
echo "<h2>Pengulangan 1 - 10</h2>"
$i=1;
while($i<=10){
  echo $i."<br/>";
  $i++;
}

// Pengulangan DO..WHILE
echo "<h2>Pengulangan 1 - 10</h2>"
$i=1;
do {
  echo $i."<br/>";
  $i++;
}while($i<=10);

// Pengkondisian If
if($userid == 'informatika'){
  echo 'benar';
}

// Pengkondisian If-Else
if($userid == 'informatika'){
  echo "benar";
} else {
  echo "salah";
}

// Pengkondisian If-Else if
$nama_hari = date("1");
if($nama_hari == 'Sunday'){
  echo "Minggu";
} elseif($nama_hari == "Monday") {
  echo "Senin";
} else {
  echo "Selasa";
}

// Pengkondisian Switch
$nama_hari = date("1");
switch($nama_hari){
  case "Sunday" : {echo "Minggu";}
    break;
  case "Monday" : {echo "Senin";}
    break;
  case "Tuesday" : {echo "Selasa";}
    break;
  default : echo "Sabtu";
}

// Ternary
$greeting = (date("H") <= 12 ) ? "Selamat Pagi" : "Selamat Siang";
echo $greeting;

?>

