<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatInap extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];
		$this->load->model('Pasien_model', 'pasien');
		$this->load->model('RawatInap_model', 'rawatinap');
	}

	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['units'] = $this->db->get('unit')->result_array();

		$id_unit = $this->input->get('id_unit');

		if ($id_unit != null) {
			$data['rawatinaps'] = $this->rawatinap->getFilterDataRawatInap($id_unit)->result_array();
			$data['sum_rawatinap'] = $this->rawatinap->sumTotalPendapatanRawatInap($id_unit)->row_array();
		}else{
			$data['rawatinaps'] = $this->rawatinap->getDataRawatInap()->result_array();
			$data['sum_rawatinap'] = $this->rawatinap->sumTotalPendapatanRawatInap()->row_array();
		}

		$data['title'] = 'Data Rawat Inap';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('rawatinap/index', $data);
		$this->load->view('templates/footer');
	}


	public function addRawatInap(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();
		$data['units'] = $this->db->get('unit')->result_array();

		$data['title'] = 'Tambah Rawat Inap';

		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
		$this->form_validation->set_rules('id_unit', 'Unit', 'required');
		$this->form_validation->set_rules('tanggal_rawatinap', 'Tanggal Rawat Inap', 'required');
		$this->form_validation->set_rules('no_reg', 'No Reg', 'required');
		$this->form_validation->set_rules('perawatan', 'Jenis Perawatan', 'required');
		$this->form_validation->set_rules('jumlah_perawatan', 'Jumlah Perawatan', 'required');
		$this->form_validation->set_rules('jumlah_tindakan', 'Jumlah Tindakan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('rawatinap/addRawatInap', $data);
			$this->load->view('templates/footer');
		}else{
			$this->rawatinap->addRawatInap();
			alert_success('Data Rawat Inap berhasil ditambah!');
			redirect('RawatInap/addRawatInap');
		}
	}

	public function editRawatInap($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();

		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();
		$data['units'] = $this->db->get('unit')->result_array();
		$data['rawatinap'] = $this->rawatinap->getDataRawatInap($id)->row_array();

		$data['title'] = 'Edit Rawat Inap';

		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
		$this->form_validation->set_rules('id_unit', 'Unit', 'required');
		$this->form_validation->set_rules('tanggal_rawatinap', 'Tanggal Rawat Inap', 'required');
		$this->form_validation->set_rules('no_reg', 'No Reg', 'required');
		$this->form_validation->set_rules('perawatan', 'Jenis Perawatan', 'required');
		$this->form_validation->set_rules('jumlah_perawatan', 'Jumlah Perawatan', 'required');
		$this->form_validation->set_rules('jumlah_tindakan', 'Jumlah Tindakan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('rawatinap/editRawatInap', $data);
			$this->load->view('templates/footer');
		}else{
			$this->rawatinap->editRawatInap($id);
			alert_success('Data Rawat Inap berhasil diperbarui!');
			redirect('RawatInap');
		}
	}

	public function deleteDataRawatInap($id){
		$this->rawatinap->deleteRawatInap($id);
		alert_success('Data rawat inap berhasil dihapus!');
		redirect('RawatInap');
	}

	public function exportToExcel($id_unit = null){

		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Rekapitulasi Data Rawat Inap';
		$data['titleFile'] = "Data Rawat Inap";

		if ($id_unit != null) {
			$data['rawatinaps'] = $this->rawatinap->getFilterDataRawatInap($id_unit)->result_array();
			$data['sum_rawatinap'] = $this->rawatinap->sumTotalPendapatanRawatInap($id_unit)->row_array();
			$data['rawatinap_tanggal_inap'] = $this->rawatinap->getDataRawatInapOnlyTglRawatInap($id_unit)->result_array();

		}else{
			$data['rawatinaps'] = $this->rawatinap->getDataRawatInap()->result_array();
			$data['sum_rawatinap'] = $this->rawatinap->sumTotalPendapatanRawatInap()->row_array();
			$data['rawatinap_tanggal_inap'] = $this->rawatinap->getDataRawatInapOnlyTglRawatInap()->result_array();
		}

		$this->load->view('rawatinap/exportExcel', $data);
	}
}