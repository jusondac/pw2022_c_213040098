<?php
  require '../../functions.php';
  $keyword = $_GET["keyword"];

  $per_page = 5;
  $all_data_count = mysqli_num_rows(just_query("SELECT * FROM patients"));
  $page_count = ceil($all_data_count / $per_page);
  $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
  $start_data = ( $per_page * $current_page ) - $per_page;

  $query = "SELECT p.id, p.nama, p.usia, p.email, st.name as status
    FROM patients p
    join statuses st
    on p.status_id = st.id
    WHERE nama LIKE '%$keyword%'
    LIMIT $start_data, $per_page";
  $patients = query($query);
?>
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th>name</th>
      <th>usia</th>
      <th>status</th>
      <th colspan="3">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($patients as $key => $value): ?>
    <tr>
      <td><?php echo $value['nama'] ?></td>
      <td><?php echo $value['usia'] ?></td>
      <td><?php echo $value['status'] ?></td>
      <td  style="width: 3rem">
        <a href="update_patients.php?id=<?= $value['id'] ?>"  class="btn btn-success d-flex align-items-center justify-content-center box-shadow">
          <span class="material-icons-sharp">edit</span>
        </a>
      </td>
      <td  style="width: 3rem">
        <a href="detail_patient.php?id=<?= $value['id'] ?>"  class="btn btn-primary d-flex align-items-center justify-content-center box-shadow">
          <span class="material-icons-sharp">visibility</span>
        </a>
      </td>
      <td  style="width: 3rem">
        <a href="hapus_patients.php?id=<?= $value['id'] ?>"  class="btn btn-danger d-flex align-items-center justify-content-center box-shadow">
          <span class="material-icons-sharp">delete</span>
        </a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
