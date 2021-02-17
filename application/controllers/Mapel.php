<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Mapel extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model("Model_mapel");
  if(!$this->session->userdata('logged_in')){
    redirect('login','refresh');
}
}
  public function index(){
  	$data['data']=$this->Model_mapel->getAll();
  	$this->template->display_admin('view_mapel.php',$data);
  }
  public function simpan(){
  	$id_mapel=$this->input->post('id_mapel',true);
  	$nama_mapel=$this->input->post('nama_mapel',true);
  	$guru=$this->input->post('guru',true);
    $aktif=$this->input->post('aktif',true);
  	$this->Model_mapel->simpan($id_mapel,$nama_mapel,$guru,$aktif);
  	redirect('Mapel');
  }
  public function ubah(){
  	$id_mapel=$this->input->post('id_mapel',true);
  	$nama_mapel=$this->input->post('nama_mapel',true);
  	$guru=$this->input->post('guru',true);
    $aktif=$this->input->post('aktif',true);
  	$this->Model_mapel->ubah($id_mapel,$nama_mapel,$guru,$aktif);
    redirect('Mapel');
  }
  function edit(){
    $id_mapel = $this->input->post('id_mapel',true);
    $data = $this->Model_mapel->getByID($id_mapel);
    $result = $data->row();
    if (!(strchr($result->aktif, "yes"))){
      $aktif = "selected";
      $tidak = "";
    }else{
      $aktif = "";
      $tidak = "selected";
    }
    echo "<form action='". base_url()."mapel/ubah ' method='POST'>
    <div class='mb-3'>
      <label for='exampleInputEmail1' class='form-label'>id_mapel</label>
      <input type='text' class='form-control' id='exampleInputEmail1' value='". $result->id_mapel ."' aria-describedby='emailHelp' name='id_mapel'>
    </div>
     <div class='mb-3'>
      <label for='exampleInputPassword1' class='form-label'>Nama mapel</label>
       <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->nama_mapel ."' name='nama_mapel'>
    </div>
    <div class='mb-3'>
      <label for='exampleInputPassword1' class='form-label'>guru</label>
       <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->guru."' name='guru'>
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
      $this->Model_mapel->hapus($id);
      $this->session->set_flashdata('DANGER',"Data.berhasil.di.hapus");
      redirect('Mapel');
  }
}