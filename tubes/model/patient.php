<?php
  class Patient extends ApplicationModel {
    public function all() {
      $sql = "select p.id, p.nama, p.usia, st.name as status from patients p join statuses st on p.status_id = st.id";
      $result = mysqli_query($this->connection, $sql);
      return parent::convert($result);
    }

    public function destroy($id){
      $sql = "DELETE FROM patients WHERE id = $id";
      $result = parent::send_query($sql);
      return parent::affected_rows();
    }

    public function list_all_status() {
      $sql = "select * from statuses";
      $result = mysqli_query($this->connection, $sql);
      return parent::convert($result);
    }

    public function percentage() {
      [$recover, $on_medic, $injured] = parent::get_statuses_val();
      $total = count($this->all());
      $recover = ($recover["total"] / $total) * 100;
      $on_medic = ($on_medic["total"] / $total) * 100;
      $injured = ($injured["total"] / $total) * 100;
      return [round($recover), round($on_medic), round($injured)];
    }

    public function value_from_status(){
      [$recover, $on_medic, $injured] = parent::get_statuses_val();
      return [$recover,$on_medic,$injured];
    }

    public function add($data){
      $nama = htmlspecialchars($data['nama']);
      $email = htmlspecialchars($data['email']);
      $usia = htmlspecialchars($data['usia']);
      $status_id = $data['status'];
      $sql = "INSERT INTO patients VALUES( null, '$nama', $usia, null, '$email', $status_id )";
      $result = mysqli_query($this->connection, $sql);
      return parent::affected_rows($result);
    }


  }
?>
