
<div class="container-fluid">

   
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nilai Rapot
              
            </h6>
            </div>
            <div class="card-body">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">id_nilai</th>
      <th scope="col">nis</th>
      <th scope="col">nama siswa</th>
      <th scope="col">mapel</th>
      <th scope="col">Nama guru</th>
      <th scope="col">Nilai</th>
      <th scope="col">Tanggal</th>

    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data->result_array()as $row){
    ?>
    <tr>
      <th><?= $row['id_nilai']; ?></th>
      <td><?= $row['nis']; ?></td>
      <td><?= $row['nama']; ?></td>
      <td><?= $row['nama_mapel']; ?></td>
      <td><?= $row['guru']; ?></td>
      <td><?= $row['nilai']; ?></td>
      <td><?= $row['tanggal']; ?></td>
    <?php } ?>
    </tr>
  </tbody>
</table>
          </div>
        </div>

        </div>

       


