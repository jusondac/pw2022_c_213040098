<?php
  class Disease extends ApplicationModel {
    public function all(){
      $sql = "SELECT id,name FROM diseases";
      $result = mysqli_query($this->connection, $sql);
      return parent::convert($result);
    }
  }
?>
