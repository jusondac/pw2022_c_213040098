<?php
  // Array
  // membuat array

  $hari = ['senin','selasa','rabu'];
  $bulan = ['Januari','Februari','Maret'];
  $arr = [100,'teks',true];

  // menampilkan array
  // versi debugging

  // var_dump($hari);
  // echo '<br>';
  // print_r($bulan);

  // menampilakn 1 elemen
  // echo $arr[0];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Latihan array</title>
    <style>
      .kotak {
        width: 30px;
        height: 30px;
        background-color: #BADA55;
        text-align: center;
        line-height: 30px;
        margin: 3px;
        float: left;
        transition: 1s;
      }
      .kotak:hover {
        transform: rotate(360deg);
        border-radius: 50%;
      }
      .clear {
        clear: both;
      }
    </style>
  </head>
  <body>
    <?php
      // $angka = [1,2,3,4,5,6,7,8,9]; 1 dimensi
      $angka = [[1,2,3],[4,5,6],[7,8,9]]; // 2 dimensi
     ?>

     <?php foreach ($angka as $a):?>
       <?php foreach ($a as $b):?>
          <div class="kotak">
            <?= $b ?>
          </div>
      <?php endforeach ?>
      <div class="clear"></div>
    <?php endforeach ?>
  </body>
</html>
