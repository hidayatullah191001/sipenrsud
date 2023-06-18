<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatJalan extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];
		$this->load->model('Pasien_model', 'pasien');
		$this->load->model('RawatJalan_model', 'rawatjalan');
	}

	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();

		$data['rawatjalans'] = $this->rawatjalan->getDataRawatJalan()->result_array();
		$data['sum_rawatjalan'] = $this->rawatjalan->sumTotalRawatJalan()->row_array();

		$data['title'] = 'Data Rawat Jalan';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('rawatjalan/index', $data);
		$this->load->view('templates/footer');
	}


	public function addRawatJalan(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();
		$data['units'] = $this->db->get('unit')->result_array();

		$data['title'] = 'Tambah Rawat Jalan';

		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
		$this->form_validation->set_rules('tanggal_rawatjalan', 'Tanggal Rawat Jalan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('rawatjalan/addRawatJalan', $data);
			$this->load->view('templates/footer');
		}else{
			$this->rawatjalan->addRawatJalan();
			alert_success('Data Rawat Jalan berhasil ditambah!');
			redirect('rawatjalan/addRawatJalan');
		}
	}

	public function editRawatJalan($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();

		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();
		$data['rawatjalan'] = $this->rawatjalan->getDataRawatJalan($id)->row_array();

		$data['title'] = 'Edit Rawat Jalan';

		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
		$this->form_validation->set_rules('tanggal_rawatjalan', 'Tanggal Rawat Jalan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('rawatjalan/editRawatJalan', $data);
			$this->load->view('templates/footer');
		}else{
			$this->rawatjalan->editRawatJalan($id);
			alert_success('Data Rawat Jalan berhasil diperbarui!');
			redirect('rawatjalan');
		}
	}

	public function deleteDataRawatJalan($id){
		$this->rawatjalan->deleteRawatJalan($id);
		alert_success('Data rawat jalan berhasil dihapus!');
		redirect('rawatjalan');
	}

	public function exportToExcel(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Rekapitulasi Data Rawat Jalan';
		$data['titleFile'] = "Data Rawat Jalan";

		$data['rawatjalans'] = $this->rawatjalan->getDataRawatJalan()->result_array();
		$data['sum_rawatjalan'] = $this->rawatjalan->sumTotalRawatJalan()->row_array();
		$data['rawatjalan_tanggal_jalan'] = $this->rawatjalan->getDataRawatJalanOnlyTglRawat()->result_array();

		$this->load->view('rawatjalan/exportExcel', $data);
	}
}