<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 tekt-gray-800">
    <span class="fas fa-tachometer-alt"></span>&nbspGambar

  </h1>
</div>
<div class="container-fluid">

   
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gambar
              <a href="#" type="button" class="btn btn-dark btn-icon-split float-right" data-toggle="modal" data-target=".bd-example-modal-xl">
                <span class=" icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
            </h6>
            </div>
            <div class="card-body">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nis</th>
      <th scope="col">Gambar</th>
      <th scope="col">Aktif</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data->result_array()as $row){
    ?>
    <tr>
      <th><?= $row['id']; ?></th>
      <td><?= $row['nis']; ?></td>
      <td><img src="<?php echo base_url() . 'assets/foto/' . $row['foto'];?>" width="80px" height="60px"></td>
      <td><?= $row['aktif']; ?></td>
      <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_modal" onclick="edit('<?php echo $row['id']; ?>')">Edit</button>
        <a href="<?php echo base_url(); ?>gambar/hapus/<?php echo $row['id']; ?>" class="btn btn-dark" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');" >Hapus</a>
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
                 <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Kelas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body">
       <div class="container-fluid">
        <form action="<?php echo base_url().'gambar/simpan';?>" enctype="multipart/form-data" method="POST">
     <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">id</label>
       <input type="hedden" class="form-control" id="gambar" readonly="readonly" name="id" value="<?php echo $autoid?>">
     </div>
      <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">nis</label>
        <select name="nis" class="form-control custome select">
          <option value="">-----pilih siswa-----</option>
          <?php foreach($nis->result_array() as $row){ ?>
            <option value="<?php echo $row['nis'] ?>"><?php echo $row ['nama'] ?></option>
            <?php }?>
        </select>

     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">gambar</label>
        <input type="file" class="form-control" id="exampleInputPassword1" name="foto" id="foto">
     </div>
      <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">aktif</label>
       <select class="form-control" aria-label="Default select example" name="aktif">
      <option selected>Open this select menu</option>
      <option value="1">Yes</option>
      <option value="2">No</option>
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
                 <h5 class="modal-title" id="exampleModalLabel">Edit gambar</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body" id="edit_gambar">
</div>
         </div>
     </div>
   </div>

<script type="text/javascript">
          	function edit(kode_kelas){
          		var id = kode_kelas;
          		$.ajax({
          			type: 'POST',
          			data: 'kode_kelas=' + id,
          			url: '<?php echo base_url(); ?>kelas/edit',
          			success: function(data){
          				$('#edit_kelas').html(data);
          			}
          		});
          	}
          </script>
<!-- End Modal -->


