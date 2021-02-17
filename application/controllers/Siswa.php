<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Siswa extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model("Model_siswa");
	$this->load->model("Model_kelas");
	if(!$this->session->userdata('logged_in')){
		redirect('login','refresh');
	}
}
  public function index(){
	  $data['data']=$this->Model_siswa->get();
	  $data['kelas']=$this->Model_kelas->getAll();
  	$this->template->display_admin('view_siswa.php',$data);
  }
  public function simpan(){
  	$nis=$this->input->post('nis',true);
  	$nama=$this->input->post('nama',true);
  	$password=$this->input->post('password',true);
  	$alamat=$this->input->post('alamat',true);
  	$kota_kab=$this->input->post('kota_kab',true);
  	$gender=$this->input->post('gender',true);
  	$kelas=$this->input->post('kelas',true);
  	$this->Model_siswa->simpan($nis,$nama,$password,$alamat,$kota_kab,$gender,$kelas);
  	redirect('Siswa');
  }
  public function ubah(){
	$nis=$this->input->post('nis',true);
  	$nama=$this->input->post('nama',true);
  	$password=$this->input->post('password',true);
  	$alamat=$this->input->post('alamat',true);
  	$kota_kab=$this->input->post('kota_kab',true);
  	$gender=$this->input->post('gender',true);
  	$kelas=$this->input->post('kelas',true);
  	$this->Model_siswa->ubah($nis,$nama,$password,$alamat,$kota_kab,$gender,$kelas);
  	redirect('Siswa');
}
function edit(){
  $nis = $this->input->post('nis',true);
  $data = $this->Model_siswa->getByID($nis);
  $kelas= $this->Model_kelas->getAll();
  $result = $data->row();
  if (!(strchr($result->gender, "L"))){
	$pria = "selected";
	$wanita = "";
  }else{
	$pria = "";
	$wanita = "selected";
  }
  echo "<form action='". base_url()."siswa/ubah ' method='POST'>
  <div class='mb-3'>
	<label for='exampleInputEmail1' class='form-label'>nis</label>
	<input type='text' class='form-control' id='exampleInputEmail1' value='". $result->nis ."' aria-describedby='emailHelp' name='nis'>
  </div>
   <div class='mb-3'>
	<label for='exampleInputPassword1' class='form-label'>Nama</label>
	 <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->nama ."' name='nama'>
  </div>
  <div class='mb-3'>
	<label for='exampleInputPassword1' class='form-label'>password</label>
	 <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->password ."' name='password'>
  </div>
  <div class='mb-3'>
	<label for='exampleInputPassword1' class='form-label'>alamat</label>
	 <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->alamat ."' name='alamat'>
  </div class='mb-3'>
	<label for='exampleInputPassword1' class='form-label'>kota_kab</label>
	 <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->kota_kab ."' name='kota_kab'>
  </div>
   <div class='mb-3'>
	<label for='exampleInputPassword1' class='form-label'>gender</label>
	<select class='form-control' aria-label='Default select example' name='gender'>
   <option value='L' ". $pria.">pria</option>
   <option value='P' ". $wanita."'>wanita</option>
	</select> 
	</div class='form-group'>
	<label for='ekelas' class='form-label'>kelas</label>
	 <select name='kelas' class='form-control costume-select'>";
	 foreach($kelas->result_array() as $row){
		 if(!(strcmp($result->kelas,$row['kode_kelas']))){
			 $selected = 'selected';{}
		 } else{
			 $selected ="";
		 }
		 echo "<option value='" . $row['kode_kelas']. "' " . $selected . ">" . $row['nama_kelas']."</option>";
	 }
	 
	 echo"
	 </select>
  </div>
	<div class='modal-footer'>
	<button type='submit' class='btn btn-secondary'><span class='fa fa-save'></span>&nbspSimpan</button>
	<button type='button' class='btn btn-dark' data-dismiss='modal'><span class='fa fa-times'></span>&nbspBatal</button>
</div>
	</form>";
}
  function hapus(){
    $id=$this->uri->segment(3);
      $this->Model_siswa->hapus($id);
      $this->session->set_flashdata('DANGER',"Data.berhasil.di.hapus");
      redirect('Siswa');
  }
}
