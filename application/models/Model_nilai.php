<?php
class Model_nilai extends CI_Model {
	function __construct(){
		parent:: __construct();
	}
	function getAll(){
		$data = $this->db->order_by('id_nilai', 'ASC');
		$data = $this->db->get('tb_nilai');
		return $data;
	}
	function getByID($id_nilai){
		$data = $this->db->where('id_nilai',$id_nilai);
		$data = $this->db->get('tb_nilai');
		return $data;
	}
	function get(){
		$data=$this->db->query("SELECT tb_nilai.id_nilai AS id_nilai, tb_nilai.nis AS nis, tb_nilai.mapel AS mapel, tb_nilai.nilai AS nilai, tb_nilai.tanggal AS tanggal, tb_mapel.id_mapel AS id_mapel, tb_mapel.nama_mapel AS nama_mapel, tb_mapel.guru AS guru, tb_mapel.aktif AS aktif , tb_siswa.* FROM tb_nilai LEFT JOIN tb_siswa ON tb_nilai.nis=tb_siswa.nis 
		LEFT JOIN tb_mapel ON tb_nilai.mapel= tb_mapel.id_mapel ORDER BY tb_nilai.nis DESC");
		return $data; 
	}
	function simpan($id_nilai,$nis,$mapel,$nilai,$tanggal){
		$data=array(
			'id_nilai'=>$id_nilai,
			'nis'=>$nis,
			'mapel'=>$mapel,
			'nilai'=>$nilai,
			'tanggal'=>$tanggal
		);
		$this->db->insert('tb_nilai',$data);
	}
	function ubah($id_nilai,$nis,$mapel,$nilai,$tanggal){
		$data=array(
			'nis'=>$nis,
			'mapel'=>$mapel,
			'nilai'=>$nilai,
			'tanggal'=>$tanggal
		);
		$this->db->where('id_nilai',$id_nilai);
		$this->db->update('tb_nilai',$data);
	}
	function hapus($id){
		$data=$this->db->where('id_nilai',$id);
		$data=$this->db->delete('tb_nilai');
		if($id){
			return TRUE;
		}else {
			return FALSE;
		}

	}
	function cari($nis) {
		$data=$this->db->query("SELECT 
		tb_siswa.nis AS nis , 
		tb_siswa.nama AS nama ,
		tb_mapel.guru AS guru, 
		tb_mapel.id_mapel AS id_mapel ,
		tb_mapel.nama_mapel AS nama_mapel ,
		tb_nilai.id_nilai AS id_nilai,
		tb_nilai.nis AS nis,
		tb_nilai.mapel AS mapel,
		tb_nilai.nilai AS nilai,
		tb_nilai.tanggal AS tanggal FROM tb_nilai LEFT JOIN tb_siswa ON tb_nilai.nis = tb_siswa.nis LEFT JOIN tb_mapel ON tb_nilai.mapel = tb_mapel.id_mapel WHERE tb_nilai.nis= $nis");
		return $data;
		}
}