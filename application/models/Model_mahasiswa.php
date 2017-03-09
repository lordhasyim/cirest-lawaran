<?php 

class Model_mahasiswa extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_count_mahasiswa() {
		$this->db->count_all_results('mahasiswa', FALSE);

		//return $query->execute();
	}

	public function get_mahasiswa($size, $page)
	{
		return $this->db->get('mahasiswa', $size, $page);
	}

	public function insert_mahasiswa($data_mahasiswa)
	{
		$val = array(
			'npm' 	=> $data_mahasiswa['npm'],
			'nama' 	=> $data_mahasiswa['nama'],
			'kelas'	=> $data_mahasiswa['kelas'],
			'tanggalLahir' => $data_mahasiswa['tanggalLahir']
		);
	}

	public function update_mahasiswa($data_mahasiswa, $npm)
	{
		$val = array(
			'nama'	=> $data_mahasiswa['nama'],
			'kelas'	=> $data_mahasiswa['kelas'],
			'tanggalLahir' => $data_mahasiswa['tanggalLahir']
		);

		$this->db->where('npm', $npm);
		$this->db->update('mahasiswa', $val);

	}

	public function delete_mahasiswa($npm)
	{
		$val = array(
			'npm' => $npm
		);

		$this->db->delete('mahasiswa', $val);
	}

}