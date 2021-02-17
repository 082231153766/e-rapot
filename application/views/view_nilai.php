<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 tekt-gray-800">
    <span class="fas fa-tachometer-alt"></span>&nbspNilai

  </h1>
</div>
<div class="container-fluid">

   
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nilai
              <a href="#" type="button" class="btn btn-dark btn-icon-split float-right" data-toggle="modal" data-target=".bd-example-modal-xl">
                <span class=" icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah nilai</span>
            </a>
            </h6>
            </div>
            <div class="card-body">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">id_nilai</th>
      <th scope="col">nama Siswa</th>
      <th scope="col">mapel</th>
      <th scope="col">nilai</th>
      <th scope="col">tanggal</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data->result_array()as $row){
    ?>
    <tr>
      <th><?= $row['id_nilai']; ?></th>
      <td><?= $row['nama']; ?></td>
      <td><?= $row['nama_mapel']; ?></td>
      <td><?= $row['nilai']; ?></td>
      <td><?= $row['tanggal']; ?></td>
      <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_modal" onclick="edit('<?php echo $row['id_nilai']; ?>')">edit</button>
        <a href="<?php echo base_url(); ?>nilai/hapus/<?php echo $row['id_nilai']; ?>" class="btn btn-dark" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');" >Hapus</a>
    <?php } ?>
    </tr>
  </tbody>
</table>
          </div>
        </div>

        </div>

        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan nilai</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body">
       <div class="container-fluid">
        <form action="<?php echo base_url().'nilai/simpan';?>" enctype="multipart/form-data" method="POST">
     <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">id_nilai</label>
       <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_nilai">
     </div>
     <div class="form-group">
    <label for="aktif" class="control-label">Nama_siswa</label>
    <select name='nis' class='form-control' custome="custome-select">
      <?php foreach ($siswa->result_array() as $row){?> <option value="<?php echo $row['nis'] ?>"><?php echo $row['nama'] ?></option><?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="aktif" class="control-label">Nama_mapel</label>
    <select name='mapel' class='form-control' custome="custome-select">
      <?php foreach ($mapel->result_array() as $row){?> <option value="<?php echo $row['id_mapel'] ?>"><?php echo $row['nama_mapel'] ?></option><?php } ?>
    </select>
  </div>
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">nilai</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="nilai">
     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">tanggal</label>
        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal">
     </div>
  
</div>
                 
              </div>
                    <!-- end content modal -->
                    <div class="modal-footer">
                <button type="submit" class="btn btn-secondary"><span class="fa fa-save"></span>&nbspSimpan</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times"></span>&nbspBatal</button>
            </div>
            </form>
            
         </div>

     </div>
   </div> 
   <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit nilai</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body" id="edit_nilai">
</div>
         </div>
     </div>
   </div>

<script type="text/javascript">
          	function edit(id_nilai){
          		var id = id_nilai;
          		$.ajax({
          			type: 'POST',
          			data: 'id_nilai=' + id,
          			url: '<?php echo base_url(); ?>nilai/edit',
          			success: function(data){
          				$('#edit_nilai').html(data);
          			}
          		});
          	}
          </script>
<!-- End Modal -->


