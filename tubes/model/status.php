<?php
  class Status extends ApplicationModel {
    public function all(){
      $sql = "SELECT id,name FROM statuses";
      $result = parent::send_query($sql);
      return parent::convert($result);
    }
  }
?>
