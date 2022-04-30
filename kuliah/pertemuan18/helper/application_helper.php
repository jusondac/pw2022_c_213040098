<?php
  function query_status_msg($message, $location){
    return "<script>
      alert('$message');
      document.location.href = '$location';
    </script>";
  }
?>