<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];

		$this->load->model('Obat_model', 'obat');
		$this->load->model('Pasien_model', 'pasien');
	}


	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Data obat';

		$data['obats'] = $this->obat->getDataObat()->result_array();
		$data['sum_obat'] = $this->obat->sumTotalObat()->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('obat/index', $data);
		$this->load->view('templates/footer');
	}

	public function addDataObat(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Tambah Data obat';

		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();

		$this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'required');
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('obat/addDataObat', $data);
			$this->load->view('templates/footer');
		}else{
			$this->obat->addObat($data['user']['id']);
			alert_success('Data penjualan obat berhasil ditambah!');
			redirect('obat');
		}
	}

	public function editDataObat($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Edit Data obat';

		$data['obat'] = $this->obat->getDataObat($id)->row_array();
		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();

		$this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'required');
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('obat/editDataObat', $data);
			$this->load->view('templates/footer');
		}else{
			$this->obat->editObat($id);
			alert_success('Data penjualan obat berhasil diperbarui!');
			redirect('obat');
		}
	}

	public function deleteDataObat($id){
		$this->obat->deleteObat($id);
		alert_success('Data penjualan obat berhasil dihapus!');
		redirect('obat');
	}

	public function exportToExcel(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Rekapitulasi Penjualan Obat Apotik';
		$data['titleFile'] = "Data obat";

		$data['obats'] = $this->obat->getDataObat(null, 'ASC')->result_array();
		$data['obat_tgl_penjualan'] = $this->obat->getDataObatOnlyTglPenjualan()->result_array();

		$data['sum_obat'] = $this->obat->sumTotalObat()->row_array();

		$this->load->view('obat/exportExcel', $data);
	}
}