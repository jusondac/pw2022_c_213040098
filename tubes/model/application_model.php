<?php
  class ApplicationModel {
    public $connection;
    public function __construct() {
      $this->connection = mysqli_connect("localhost","rejka","rejkapass","hospital");;
    }

    protected function convert($result) {
      $rows = [];while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
      };return $rows;
    }

    public function get_statuses_val(){
      $recover = $this->send_once_query("SELECT count(*) as 'total' FROM patients WHERE status_id = 1");
      $on_medic = $this->send_once_query("SELECT count(*) as 'total' FROM patients WHERE status_id = 2");
      $injured = $this->send_once_query("SELECT count(*) as 'total' FROM patients WHERE status_id = 3");
      return [$recover, $on_medic, $injured];
    }

    public function affected_rows(){
      return mysqli_affected_rows($this->connection);
    }

    public function send_query($query){
      return mysqli_query($this->connection, $query) or die("Tidak dapat di eksekusi");
    }

    public function find_all_status($status_id) {
      $this->send_once_query("SELECT count(*) as 'total' FROM patient WHERE status_id = $status_id");
    }

    public function send_once_query($query){
      return mysqli_fetch_assoc(mysqli_query($this->connection, $query));
    }
  }
?>
