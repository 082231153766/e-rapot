<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 tekt-gray-800">
		<span class="fas fa-tachometer-alt"></span>&nbspAdmin
	</h1>
</div>
 
<!-- container -->
   <div class='container-fuild'>
 	<!--card-->
 	<div class='card shadow mb-4'>
 		<!-- card header -->
 		<div class='card-header py-3'>
 			<h6 class= "m-0 font-weight-bold text-primary">Data Admin
       <a href="#" type="button" class="btn btn-secondary btn-icon-split float-right" data-toggle="modal" data-target=".bd-example-modal-xl">
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
      <th scope="col">id_admin</th>
      <th scope="col">username</th>
      <th scope="col">pasword</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  foreach ($data->result_array()as $row){
  	  ?>
    <tr>
      <td><?= $row['id_admin']; ?></td>
       <td><?= $row['username']; ?></td>
       <td>**</td>
      <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_modal" onclick="edit('<?php echo $row['id_admin']; ?>')">Edit</button>
  	<a href="<?php echo base_url(); ?>Admin/hapus/<?php echo $row['id_admin']; ?>" class="btn btn-dark" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');" >Hapus</a></td>
  <?php } ?>
    </tr>
  </tbody>
</table>

 	</div>
 </div>

  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Barang</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body">
              <form action="<?php echo base_url() .'admin/simpan';?> "enctype="multipart/from-data" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Id_admin</label>
    <input type="text" name="id_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>     
    </select>
  </div>
 <div class="modal-footer">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span>&nbspSimpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>&nbspBatal</button>
            </div>
            </form>
         </div>
     </div>
   </div> 

 </div>
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body" id="edit_admin">
</div>
         </div>
     </div>
   </div>

<script type="text/javascript">
            function edit(id_admin){
              var id = id_admin;
              $.ajax({
                type: 'POST',
                data: 'id_admin=' + id,
                url: '<?php echo base_url(); ?>admin/edit',
                success: function(data){
                  $('#edit_admin').html(data);
                }
              });
            }
          </script>
<!-- End Modal -->