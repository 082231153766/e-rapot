<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 tekt-gray-800">
    <span class="fas fa-tachometer-alt"></span>&nbspSiswa
  </h1>
</div>
<div class="container-fluid">

   
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data siswa
                  <a href="#" type="button" class="btn btn-dark btn-icon-split float-right" data-toggle="modal" data-target=".bd-example-modal-xl">
                <span class=" icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Siswa</span>
            </a>
              </h6>
            </div>
            <div class="card-body">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">nis</th>
      <th scope="col">nama</th>
      <th scope="col">password</th>
      <th scope="col">alamat</th>
      <th scope="col">kota_kab</th>
      <th scope="col">gender</th>
      <th scope="col">kelas</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data->result_array()as $row){
    ?>
    <tr>
      <th><?= $row['nis']; ?></th>
      <td><?= $row['nama']; ?></td>
      <td>******</td>
      <td><?= $row['alamat']; ?></td>
      <td><?= $row['kota_kab']; ?></td>
      <td><?= $row['gender']; ?></td>
      <td><?= $row['nama_kelas']; ?></td>
      <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_modal" onclick="edit('<?php echo $row['nis']; ?>')">Edit</button>
      <a href="<?php echo base_url(); ?>Siswa/hapus/<?php echo $row['nis']; ?>" class="btn btn-dark" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');" >Hapus</a></td>
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
                 <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Siswa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body">
                           <div class="container-fluid">
             <form action="<?php echo base_url().'Siswa/simpan';?>" enctype="multipart/form-data" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nis</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nis">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nama</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="nama">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">alamat</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="alamat">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">kota_kab</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="kota_kab">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">gender</label>
    <select class="form-control" aria-label="Default select example" name="gender">
  <option selected>Open this select menu</option>
  <option value="1">Perempuan</option>
  <option value="2">Laki-Laki</option>
</select>
  </div>

  <div class="form-group">
    <label for="aktif" class="control-label">Kelas</label>
    <select name='kelas' class='form-control' custome="custome-select">
      <?php foreach ($kelas->result_array() as $row){?> <option value="<?php echo $row['kode_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option><?php } ?>
    </select>
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
                 <h5 class="modal-title" id="exampleModalLabel">Edit siswa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body" id="edit_siswa">
</div>
         </div>
     </div>
   </div>

<script type="text/javascript">
          	function edit(nis){
          		var id = nis;
          		$.ajax({
          			type: 'POST',
          			data: 'nis=' + id,
          			url: '<?php echo base_url(); ?>siswa/edit',
          			success: function(data){
          				$('#edit_siswa').html(data);
          			}
          		});
          	}
          </script>
