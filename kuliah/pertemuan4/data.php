// built-in function
// http://php.net/manual/en/funcref.php
<?php


// Date / Time
// time()
// date()
	echo date("l");
  // l = hari
  // d = tanggal
  // m = bulan, M = bulan (huruf)
  // Y = tahun

// Time
// UNIX Time / EPOCH Time
// detik yang sudah berlalu sejak 1 januari 1970
echo time();
echo date("l", time()+60*60*24*100);

// mktime()
// jam, menit, detik, bulan, tanggal, tahun
echo date("l",mktime(0,0,0,6,7,2001));

// strtotime()
echo date("l", strtotime("26 jul 2001"));

// String
// strlen(), panjang string
// strcmp(), menggabungkan dua buah string
// explode(), pecah string
// htmlspecialchars(). protect website

// Utility
// var_dump(), mencetak fungsi dari variable, array, object
// isset(), mengecek variable sudah dibuat atau belum
// empty(), mengecek variable kosong atau tidak
// die(), memberhentikan program kita
// sleep(), program berhenti sesaat

// User Defined Strinf


?>
