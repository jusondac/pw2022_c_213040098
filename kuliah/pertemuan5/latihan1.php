<?php
  // Pertemuan 5 - ARRAY
  // Array adalah variable yang bisa menampung/menyimpan banyak nilai sekaligus

	//	$hari = "Senin"

	// Membuat Array
	$hari = ["Senin","Selasa","Rabu","Kamis"];
	$bulan = array("Januari","Februari","Maret");
	$myArr = [10,"Rejka Permana",true];

	// Mencetak Arry
	// mencetak 1 elemen dari di dalam array

	// error: convertion array to string

	// dimulai dengan index ke 0

	echo $hari[0];
	echo "<br/>";
	echo $bulan[2];
	echo "<hr>";
	echo $myArr[0];
	echo "<hr>";

	// mencetak menggunakan var_dump() atau print_r()
	// digunakan ketika debugging
	var_dump($hari);
	echo "<br>";
	print_r($bulan);
	echo "<hr>";
	// Mencetak semua isi arrau menggunakan looping
	// for
//	for($i = 0; $i < count($hari);$i++){
//		echo $hari[$i];
//		echo "<br>";
//	}
	foreach($bulan as $b){
		echo $b;
		echo "<br>";
	}
	echo "<hr>";
	foreach ($bulan as $key => $value){
		echo "Key: $key - Value: $value";
		echo "<br>";
	}
	echo "<hr>";
	// menambahkan kata di akhir array
	array_push($hari,"Jum'at");
	$hari[]="Sabtu";
	print_r($hari);
?>

