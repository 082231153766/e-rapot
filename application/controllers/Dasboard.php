<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Dasboard extends CI_Controller{
	function __construct(){
	parent::__construct();
	if(!$this->session->userdata('logged_in')){
		redirect('login','refresh');
	}
}
  public function index(){
  	$this->template->display_admin('view_dasboard.php');
  }
}