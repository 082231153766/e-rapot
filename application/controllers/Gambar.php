<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Gambar extends CI_Controller{
	function __construct(){
	parent::__construct();
  $this->load->Model("Model_gambar");
  $this->load->Model("Model_siswa");
  if(!$this->session->userdata('logged_in')){
    redirect('login','refresh');
}
}
public function index(){
    $data['data']=$this->Model_gambar->getAll();
    $data['nis'] = $this->Model_siswa->getAll();
    $data['autoid']=$this->autoid();
    $this->template->display_admin('view_gambar.php',$data);
}
public function simpan(){
    // konsfigurasi librari aploud
    $config = array(
      'allowed_types' => 'jpg|jpeg|png', 'upload_path' => './assets/foto/','max_size' => '1024','file_name'=> url_title($this->input->post('foto'))
    );
    //instalasi
    $this->upload->initialize($config);
    if($this->upload->do_upload('foto')){
      $id = $this->input->post('id',true);
      $nis = $this->input->post('nis',true);
      $foto = $this->upload->file_name;
      $aktif = $this->input->post('aktif',true);

      $simpan = $this->Model_gambar->simpan($id,$nis,$foto,$aktif);
      $this->session->set_flashdata('info','data berhasil di upload');
      redirect('gambar');
    }else{
      $error = $this->upload->display_errors();
      $this->session->flash_data('danger',$error);
      redirect('gambar');
    }
}

function edit(){
  $id = $this->input->post('id',true);
  $data = $this->Model_gambar->getByID($id);
  $result = $data->row();
  if (!(strchr($result->aktif, "yes"))){
      $aktif = "selected";
      $tidak = "";
    }else{
      $aktif = "";
      $tidak = "selected";
    }
  echo "<form action='". base_url()."gambar/ubah ' method='POST'>
  <div class='mb-3'>
    <label for='exampleInputEmail1' class='form-label'>id</label>
    <input type='text' class='form-control' id='exampleInputEmail1' value='". $result->id ."' aria-describedby='emailHelp' name='id'>
  </div>
   <div class='mb-3'>
    <label for='exampleInputPassword1' class='form-label'>Nis</label>
     <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->nis ."' name='nis'>
  </div>
  <div class='mb-3'>
  <label for='exampleInputPassword1' class='form-label'>gambar</label>
   <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->gambar ."' name='gambar'>
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
    $this->Model_gambar->hapus($id);
    $this->session->set_flashdata('DANGER',"Data.berhasil.di.hapus");
    redirect('gambar');
}
function autoid(){
  $max = $this->Model_gambar->maxdata();
  $result = $max->row();
  $lastid = $result->lastid;
  if(empty($lastid)){
    $id = "00001";
  }else{
    $lastid = $lastid + 1;
    if (strlen($lastid) == '1'){
      $id = "0000" . $lastid;
    }else if (strlen($lastid) == '2'){
      $id = "000" . $lastid;
    }else if (strlen($lastid) == '3'){
      $id = "00" . $lastid;
    }else if (strlen($lastid) == '4'){
      $id = "0" . $lastid;
    }else{
      $id=$lastid;
    }
  }
  return $id;
}
}