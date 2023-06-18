<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapData extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];
		$this->load->model('Pasien_model', 'pasien');
		$this->load->model('RekapData_model', 'rekapdata');
		$this->load->model('RawatInap_model', 'rawatinap');
		$this->load->model('RawatJalan_model', 'rawatjalan');
		$this->load->model('Obat_model', 'obat');
		$this->load->model('Parkir_model', 'parkir');
	}

	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['pasiens'] = $this->pasien->getDataPasien()->result_array();

		$data['datapengguna'] = $this->rekapdata->getDataPenggunaRekap()->row_array();

		$tgl_mulai = $this->input->get('tgl_mulai');
		$tgl_akhir = $this->input->get('tgl_akhir');
		$id_pasien = $this->input->get('id_pasien');

		$this->form_validation->set_rules('pengguna_anggaran', 'Pengguna Anggaran', 'required');
		$this->form_validation->set_rules('bendahara_penerimaan', 'Bendahara Penerimaan', 'required');

		if ($tgl_mulai != null && $tgl_akhir != null) {
			$data['rekapdatas'] = $this->rekapdata->getRekapData(null, $tgl_mulai, $tgl_akhir)->result_array();
		}elseif($id_pasien != null){
			$data['rekapdatas'] = $this->rekapdata->getRekapData($id_pasien, null, null)->result_array();
		}else{
			$data['rekapdatas'] = $this->rekapdata->getRekapData()->result_array();
		}
		
		$data['title'] = 'Rekap Data';

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('rekapdata/index', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				'pengguna_anggaran' => $this->input->post('pengguna_anggaran'),
				'bendahara_penerimaan' => $this->input->post('bendahara_penerimaan'),
			];
			$this->db->insert('datapengguna', $data);
			alert_success('Data pengguna sebagai laporan rekap data berhasil ditambahkan!');
			redirect('rekapdata');
		}
	}

	public function editDataPengguna($id){
		$this->form_validation->set_rules('pengguna_anggaran', 'Pengguna Anggaran', 'required');
		$this->form_validation->set_rules('bendahara_penerimaan', 'Bendahara Penerimaan', 'required');

		if ($this->form_validation->run() == false) {
			alert_success('Something went wrong!');
			redirect('rekapdata');
		}else{
			$data = [
				'pengguna_anggaran' => $this->input->post('pengguna_anggaran'),
				'bendahara_penerimaan' => $this->input->post('bendahara_penerimaan'),
			];
			$this->db->where('id', $id);
			$this->db->update('datapengguna', $data);
			alert_success('Data pengguna sebagai laporan rekap data berhasil diperbaharui!');
			redirect('rekapdata');
		}
	}

	public function hapusDataPengguna($id){
		$this->db->delete('datapengguna', ['id' => $id]);
		alert_success('Data pengguna sebagai laporan rekap data berhasil dihapus!');
		redirect('rekapdata');
	}


	public function exportToExcel(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Rekapitulasi Data Rawat Jalan';
		$data['titleFile'] = "Data Rawat Jalan";

		$tgl_mulai = $this->input->get('tgl_mulai');
		$tgl_akhir = $this->input->get('tgl_akhir');

		$data['rawatinaps'] = $this->rawatinap->getDataRawatInap(null, $tgl_mulai, $tgl_akhir)->result_array();
		$data['units'] = $this->rekapdata->getUnitRawatInap(null, $tgl_mulai, $tgl_akhir)->result_array();

		$data['sum_rawatinap'] = $this->rawatinap->sumTotalPendapatanRawatInap(null, $tgl_mulai, $tgl_akhir)->row_array();
		$data['sum_rawatjalan'] = $this->rawatjalan->sumTotalRawatJalan($tgl_mulai, $tgl_akhir)->row_array();
		$data['sum_obat'] = $this->obat->sumTotalObat($tgl_mulai, $tgl_akhir)->row_array();
		$data['sum_parkir'] = $this->parkir->sumTotalSetoran($tgl_mulai, $tgl_akhir)->row_array();
		$data['datapengguna'] = $this->rekapdata->getDataPenggunaRekap()->row_array();

		$this->load->view('rekapdata/exportExcel', $data);
	}

	public function exportToPdf(){
		$this->load->library('Pdfgenerator');

		$id_pasien = $this->input->get('id_pasien');

		$data['pasien'] = $this->pasien->getDataPasien($id_pasien)->row_array();

		$data['rawatinaps'] = $this->rawatinap->getDataRawatInap()->result_array();
		$data['rawatjalans'] = $this->rawatjalan->getDataRawatJalan()->result_array();

		$data['obats'] = $this->obat->getDataObat()->result_array();

		$this->data['title_pdf'] = 'Rekap Data';
		$file_pdf = 'Rekap Data Pasien - '.$data['pasien']['nama'];
		$paper = 'A4';
		$orientation = "portrait";
		$html = $this->load->view('rekapdata/exportPdf', $data, true);    
		$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

		// $this->load->view('rekapdata/exportPdf', $data);    
	}
}