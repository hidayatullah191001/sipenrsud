<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parkir extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];

		$this->load->model('Parkir_model', 'parkir');
	}


	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Data Parkir';

		$data['parkirs'] = $this->parkir->getDataParkir()->result_array();
		$data['sum_parkir'] = $this->parkir->sumTotalSetoran()->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('parkir/index', $data);
		$this->load->view('templates/footer');
	}

	public function addDataParkir(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Tambah Data Parkir';

		$this->form_validation->set_rules('tgl_setor', 'Tanggal Setor', 'required');
		$this->form_validation->set_rules('tgl_setoran', 'Tanggal Setoran', 'required');
		$this->form_validation->set_rules('jumlah_setoran', 'Jumlah Setoran', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('parkir/addDataParkir', $data);
			$this->load->view('templates/footer');
		}else{
			$this->parkir->addParkir($data['user']['id']);
			alert_success('Data setoran parkir berhasil ditambah!');
			redirect('parkir');
		}
	}

	public function editDataParkir($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Edit Data Parkir';

		$data['parkir'] = $this->parkir->getDataParkir($id)->row_array();

		$this->form_validation->set_rules('tgl_setor', 'Tanggal Setor', 'required');
		$this->form_validation->set_rules('tgl_setoran', 'Tanggal Setoran', 'required');
		$this->form_validation->set_rules('jumlah_setoran', 'Jumlah Setoran', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('parkir/editDataParkir', $data);
			$this->load->view('templates/footer');
		}else{
			$this->parkir->editParkir($id);
			alert_success('Data setoran parkir berhasil diperbarui!');
			redirect('parkir');
		}
	}

	public function deleteDataParkir($id){
		$this->parkir->deleteParkir($id);
		alert_success('Data setoran parkir berhasil dihapus!');
		redirect('parkir');
	}

	public function exportToExcel(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Rekapitulasi Penerimaan Parkir';
		$data['titleFile'] = "Data Parkir";

		$data['parkirs'] = $this->parkir->getDataParkir()->result_array();
		$data['sum_parkir'] = $this->parkir->sumTotalSetoran()->row_array();

		$this->load->view('parkir/exportExcel', $data);
	}
}