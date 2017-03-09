<?php 

class MahasiswaController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_mahasiswa');
	}

	public function getMahasiswa($page, $size)
	{
		$response = array(
			'content' => $this->Model_mahasiswa->get_mahasiswa(($page -1 ) * $size, $size)->result(),
			'totalPages' => ceil($this->Model_mahasiswa->get_count_mahasiswa() / $size)
		);	


		$this->output
			 ->set_status_header(200)
			 ->set_content_type('application/json', 'utf-8')
			 ->set_output(json_encode($response,  JSON_PRETTY_PRINT))
			 ->_display();

		exit();
	}

	public function saveMahasiswa()
	{
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Model_mahasiswa->insert_mahasiswa($data);

		$response = array(
			'Success' => TRUE,
			'Info'	  => 'Data Tersimpan'
		);

		$this->output
			 ->set_status_header(201)
			 ->set_content_type('application/json', 'utf-8')
			 ->set_output(json_encode($response, JSON_PRETTY_PRINT))
			 ->_display();

		exit();

	}

	public function updateMahasiswa($npm)
	{

		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Model_mahasiswa->update_mahasiswa($data, $npm);

		$response = array(
			'Success' => TRUE,
			'Info'	  => 'Data Berhasil diupdate'
		);

		$this->output
			 ->set_status_header(200)
			 ->set_content_type('application/json', 'utf-8')
			 ->set_output(json_encode($response, JSON_PRETTY_PRINT))
			 ->_display();

		exit();

	}

	public function deleteMahasiswa($npm)
	{

		$this->Model_mahasiswa->delete_mahasiswa($npm);

		$response = array(
			'Success' => TRUE,
			'Info'	  => 'Data Berhasil dihapus'
		);

		$this->output
			 ->set_status_header(200)
			 ->set_content_type('application/json', 'utf-8')
			 ->set_output(json_encode($response, JSON_PRETTY_PRINT))
			 ->_display();

		exit();

	}

}