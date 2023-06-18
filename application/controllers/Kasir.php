<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
	public $email;

	public function __construct()
	{
		parent::__construct();
		isKasir($this->session->userdata['role_id']); 
		$this->email = $this->session->userdata['email'];

		$this->load->model('Obat_model', 'obat');
		$this->load->model('RawatInap_model', 'rawatinap');
		$this->load->model('RawatJalan_model', 'rawatjalan');
	}


	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->email])->row_array();
		$data['title'] = 'Dashboard';

		$data['sum_obat'] = $this->obat->sumTotalObat()->row_array();
		$data['sum_rawatinap'] = $this->rawatinap->sumTotalPendapatanRawatInap()->row_array();
		$data['sum_rawatjalan'] = $this->rawatjalan->sumTotalRawatJalan()->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kasir/index', $data);
		$this->load->view('templates/footer');
	}

}