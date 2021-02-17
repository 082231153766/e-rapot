<?php
class Model_siswa extends CI_Model {
	function __construct(){
		parent:: __construct();
	}
	function getAll(){
		$data = $this->db->order_by('nis', 'ASC');
		$data = $this->db->get('tb_siswa');
		return $data;
	}
	function get(){
		$data=$this->db->query("SELECT tb_kelas.kode_kelas AS kode_kelas, tb_kelas.nama_kelas AS nama_kelas, tb_siswa.*
		FROM tb_siswa LEFT JOIN tb_kelas ON tb_siswa.kelas=tb_kelas.kode_kelas ORDER BY tb_siswa.nis DESC");
		return $data;
	}
	function getByID($nis){
		$data = $this->db->where('nis',$nis);
		$data = $this->db->get('tb_siswa');
		return $data;
	}
	function simpan($nis,$nama,$password,$alamat,$kota_kab,$gender,$kelas){
		$data=array(
			'nis'=>$nis,
			'nama'=>$nama,
			'password'=>$password,
			'alamat'=>$alamat,
			'kota_kab'=>$kota_kab,
			'gender'=>$gender,
			'kelas'=>$kelas
		);
		$this->db->insert('tb_siswa',$data);
	}
	function ubah($nis,$nama,$password,$alamat,$kota_kab,$gender,$kelas){
		$data=array(
			'nama'=>$nama,
			'password'=>$password,
			'alamat'=>$alamat,
			'kota_kab'=>$kota_kab,
			'gender'=>$gender,
			'kelas'=>$kelas
		);
		$this->db->where('nis',$nis);
		$this->db->update('tb_siswa',$data);
	}
	function hapus($id){
		$data=$this->db->where('nis',$id);
		$data=$this->db->delete('tb_siswa');
		if($id){
			return TRUE;
		}else {
			return FALSE;
		}

	}
}