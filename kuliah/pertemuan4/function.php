<?php

function salam(){
	return "Selamat datang, Admin!";
}

function salam2($nama){
  return "Selamat datang, $nama!";
}

function salam3($waktu="datang",$nama="Admin"){
	return "Selamat $waktu, $nama";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Latihan function</title>
</head>
<body>
	<h1><?= salam(); ?></h1>
	<h1><?= salam2("Rejka"); ?></h1>
	<h1><?= salam3("Pagi", "Galih"); ?></h1>
</body>
</html>
