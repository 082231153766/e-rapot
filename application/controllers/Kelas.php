<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Kelas extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model("Model_kelas");
  if(!$this->session->userdata('logged_in')){
    redirect('login','refresh');
}
}
  public function index(){
  	$data['data']=$this->Model_kelas->getAll();
  	$this->template->display_admin('view_kelas.php',$data);
  }
  public function simpan(){
  	$kode_kelas=$this->input->post('kode_kelas',true);
  	$nama_kelas=$this->input->post('nama_kelas',true);
  	$aktif=$this->input->post('aktif',true);
  	$this->Model_kelas->simpan($kode_kelas,$nama_kelas,$aktif);
  	redirect('kelas');
  }
  public function ubah(){
  	$kode_kelas=$this->input->post('kode_kelas',true);
  	$nama_kelas=$this->input->post('nama_kelas',true);
  	$aktif=$this->input->post('aktif',true);
  	$this->Model_kelas->ubah($kode_kelas,$nama_kelas,$aktif);
  	redirect('kelas');
  }
  function edit(){
    $kode_kelas = $this->input->post('kode_kelas',true);
    $data = $this->Model_kelas->getByID($kode_kelas);
    $result = $data->row();
    if (!(strchr($result->aktif, "yes"))){
      $aktif = "selected";
      $tidak = "";
    }else{
      $aktif = "";
      $tidak = "selected";
    }
    echo "<form action='". base_url()."kelas/ubah ' method='POST'>
    <div class='mb-3'>
      <label for='exampleInputEmail1' class='form-label'>kode kelas</label>
      <input type='text' class='form-control' id='exampleInputEmail1' value='". $result->kode_kelas ."' aria-describedby='emailHelp' name='kode_kelas'>
    </div>
     <div class='mb-3'>
      <label for='exampleInputPassword1' class='form-label'>Nama Kelas</label>
       <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->nama_kelas ."' name='nama_kelas'>
    </div>
     <div class='mb-3'>
      <label for='exampleInputPassword1' class='form-label'>aktif</label>
      <select class='form-control' aria-label='Default select example' name='aktif'>
     <option value='yes' ". $aktif.">Yes</option>
     <option value='no' ". $tidak."'>No</option>
      </select> 
      <div class='modal-footer'>
      <button type='submit' class='btn btn-secondary'><span class='fa fa-save'></span>&nbspSimpan</button>
      <button type='button' class='btn btn-dark' data-dismiss='modal'><span class='fa fa-times'></span>&nbspBatal</button>
  </div>
      </form>";
  }
  function hapus(){
    $id=$this->uri->segment(3);
      $this->Model_kelas->hapus($id);
      $this->session->set_flashdata('DANGER',"Data.berhasil.di.hapus");
      redirect('kelas');
  }
}