<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Nilai extends CI_Controller{
	function __construct(){
	parent::__construct();
  $this->load->model("Model_nilai");
  $this->load->model("Model_mapel");
  $this->load->model("Model_siswa");
  if(!$this->session->userdata('logged_in')){
    redirect('login','refresh');
}
}
  public function index(){
    $data['data']=$this->Model_nilai->get();
    $data['mapel']=$this->Model_mapel->getAll();
    $data['siswa']=$this->Model_siswa->getAll();
  	$this->template->display_admin('view_nilai.php',$data);
  }
  public function simpan(){
  	$id_nilai=$this->input->post('id_nilai',true);
  	$nis=$this->input->post('nis',true);
  	$mapel=$this->input->post('mapel',true);
    $nilai=$this->input->post('nilai',true);
    $tanggal=$this->input->post('tanggal',true);
  	$this->Model_nilai->simpan($id_nilai,$nis,$mapel,$nilai,$tanggal);
  	redirect('Nilai');
  }
  public function ubah(){
  	$id_nilai=$this->input->post('id_nilai',true);
  	$nis=$this->input->post('nis',true);
  	$mapel=$this->input->post('mapel',true);
    $nilai=$this->input->post('nilai',true);
    $tanggal=$this->input->post('tanggal',true);
  	$this->Model_nilai->ubah($id_nilai,$nis,$mapel,$nilai,$tanggal);
  	redirect('Nilai');
  }
  function edit(){
    $id_nilai = $this->input->post('id_nilai',true);
    $data = $this->Model_nilai->getByID($id_nilai);
    $mapel = $this->Model_mapel->getAll();
    $siswa = $this->Model_siswa->getAll();
    $result = $data->row();

    echo "<form action='". base_url()."nilai/ubah ' method='POST'>
    <div class='mb-3'>
      <label for='exampleInputEmail1' class='form-label'>id Nilai</label>
      <input type='text' class='form-control' id='exampleInputEmail1' value='". $result->id_nilai ."' aria-describedby='emailHelp' name='id_nilai'>
    </div>
    <div class='form-group'>
    <label for='kelas' class='form-label'>Nama Siswa</label>
     <select name='nis' class='form-control costume-select'>";
     foreach($siswa->result_array() as $row){
       if(!(strcmp($result->siswa,$row['nis']))){
         $selected = 'selected';{}
       } else{
         $selected ="";
       }
       echo "<option value='" . $row['nis']. "' " . $selected . ">" . $row['nama']."</option>";
     }
     
     echo"
     </select>
    </div>
    <div class='form-group'>
    <label for='kelas' class='form-label'>Nama mapel</label>
     <select name='mapel' class='form-control costume-select'>";
     foreach($mapel->result_array() as $row){
       if(!(strcmp($result->mapel,$row['id_mapel']))){
         $selected = 'selected';{}
       } else{
         $selected ="";
       }
       echo "<option value='" . $row['id_mapel']. "' " . $selected . ">" . $row['nama_mapel']."</option>";
     }
     
     echo"
     </select>
    </div>
  <div class='mb-3'>
  <label for='exampleInputPassword1' class='form-label'>nilai</label>
   <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->nilai ."' name='nilai'>
</div>
<div class='mb-3'>
<label for='exampleInputPassword1' class='form-label'>tanggal</label>
 <input type='date' class='form-control' id='exampleInputPassword1' value='". $result->tanggal ."' name='tanggal'>
</div>
      <div class='modal-footer'>
      <button type='submit' class='btn btn-secondary'><span class='fa fa-save'></span>&nbspSimpan</button>
      <button type='button' class='btn btn-dark' data-dismiss='modal'><span class='fa fa-times'></span>&nbspBatal</button>
  </div>
      </form>";
  }
  function hapus(){
    $id=$this->uri->segment(3);
      $this->Model_nilai->hapus($id);
      $this->session->set_flashdata('DANGER',"Data.berhasil.di.hapus");
      redirect('Nilai');
  }
}