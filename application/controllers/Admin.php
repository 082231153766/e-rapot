<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model("Model_admin");
    if(!$this->session->userdata('logged_in')){
      redirect('login','refresh');
  }
}
  public function index(){
  	$data['data']=$this->Model_admin->getAll();
  	$this->template->display_admin('admin/view_admin.php',$data);
  }
  public function simpan(){
  	$id_admin=$this->input->post('id_admin',true);
  	$username=$this->input->post('username',true);
  	$password=$this->input->post('password',true);
  	$this->Model_admin->simpan($id_admin,$username,$password);
  	redirect('Admin');
  }
  function ubah(){
    $id_admin=$this->input->post('id_admin',true);
  	$username=$this->input->post('username',true);
  	$password=$this->input->post('password',true);
  	$this->Model_admin->ubah($id_admin,$username,$password);
  	redirect('Admin');
  }

  public function Edit(){
    $id_admin = $this->input->post('id_admin',true);
    $data = $this->Model_admin->getByID($id_admin);
    $result = $data->row();
    //  if (!(strchr($result->aktif, "yes"))){
    //   $aktif = "selected";
    //   $tidak = "";
    // }else{
    //   $aktif = "";
    //   $tidak = "selected";
    // }

    
    echo"<form action='". base_url()."admin/ubah ' method='POST'>
    <div class='mb-3'>
      <label for='exampleInputEmail1' class='form-label'>id_admin</label>
      <input type='text' class='form-control' id='exampleInputEmail1' value='". $result->id_admin ."' aria-describedby='emailHelp' name='id_admin'>
    </div>
     <div class='mb-3'>
      <label for='exampleInputPassword1' class='form-label'>username</label>
       <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->username ."' name='username'>
    </div>
      <div class='mb-3'>
      <label for='exampleInputPassword1' class='form-label'>password</label>
       <input type='text' class='form-control' id='exampleInputPassword1' value='". $result->password ."' name='password'>
    </div>
    </div>
    <div class='modal-footer'>
    <button type='submit' class='btn btn-secondary'><span class='fa fa-save'></span>&nbspSimpan</button>
    <button type='button' class='btn btn-dark' data-dismiss='modal'><span class='fa fa-times'></span>&nbspBatal</button>
  </div>
      </form>";
  }
  function hapus(){
    $id=$this->uri->segment(3);
      $this->Model_admin->hapus($id);
      $this->session->set_flashdata('DANGER',"Data.berhasil.di.hapus");
      redirect('Admin');
  }
}