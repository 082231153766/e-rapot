<?php
class Model_login extends CI_Model{
    function __construct(){
        parent:: __construct();
    }
    function cek_admin ($username,$password){
        $data=$this->db->where('username',$username);
        $data=$this->db->where('password',$password);
        $data=$this->db->get('tb_admin');

        if($data->num_rows() > 0) { //jika data ada
            return TRUE;
        }else{
            return FALSE; //jika data tidak ada
        }
    }

	function cek_siswa($nis, $password){
		$data=$this->db->where('nis', $nis);
		$data=$this->db->where('password', $password);
		$data=$this->db->get('tb_siswa');

		if ($data->num_rows() > 0){ //Jika data ada
			return TRUE;
		} else {
			return FALSE; //Jika data tidak ada
		}
	}

    
        
    
}