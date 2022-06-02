// ambil element yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('main-table');

keyword.addEventListener('keyup', function(){
  // console.log("ok");
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if( xhr.readyState == 4 && xhr.status == 200 ) {
      container.innerHTML = xhr.responseText;
    }
  }
  xhr.open('GET','assets/ajax/patient.php?keyword='+keyword.value, true);
  xhr.send();
})
