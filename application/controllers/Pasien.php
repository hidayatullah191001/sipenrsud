<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];

		$this->load->model('Pasien_model', 'pasien');
	}


	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Data Pasien';

		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pasien/index', $data);
		$this->load->view('templates/footer');
	}

	public function addDataPasien(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();

		$data['title'] = 'Tambah Data Pasien';

		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('usia', 'Usia Pasien', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pasien/addDataPasien', $data);
			$this->load->view('templates/footer');
		}else{
			$this->pasien->addPasien($data['user']['id']);
			alert_success('Data pasien berhasil ditambah!');
			redirect('pasien/addDataPasien');
		}
	}

	public function editDataPasien($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Edit Data Pasien';

		$data['pasien'] = $this->pasien->getDataPasien($id)->row_array();

		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('usia', 'Usia Pasien', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pasien/editDataPasien', $data);
			$this->load->view('templates/footer');
		}else{
			$this->pasien->editPasien($id);
			alert_success('Data pasien berhasil diperbarui!');
			redirect('pasien');
		}
	}

	public function deleteDataPasien($id){
		$this->pasien->deletePasien($id);
		alert_success('Data pasien berhasil dihapus!');
		redirect('pasien');
	}

	public function exportToExcel(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Rekapitulasi Data Pasien';
		$data['titleFile'] = "Data pasien";

		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();

		$this->load->view('pasien/exportExcel', $data);
	}
}