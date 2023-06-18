<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatInap_model extends CI_Model
{

	public function addRawatInap(){
		$jumlah_perawatan = convert_to_number($this->input->post('jumlah_perawatan'));
		$biaya_radiologi = convert_to_number($this->input->post('biaya_radiologi'));
		$biaya_labor = convert_to_number($this->input->post('biaya_labor'));
		$biaya_ekg = convert_to_number($this->input->post('biaya_ekg'));
		$biaya_bdrs = convert_to_number($this->input->post('biaya_bdrs'));
		$jumlah_tindakan = convert_to_number($this->input->post('jumlah_tindakan'));

		$total_pendapatan = $jumlah_perawatan + $biaya_radiologi + $biaya_labor + $biaya_ekg + $biaya_bdrs +  $jumlah_tindakan;

		$data = [
			'id_pasien' => $this->input->post('id_pasien'),
			'id_unit' => $this->input->post('id_unit'),
			'tanggal_rawatinap' => $this->input->post('tanggal_rawatinap'),
			'no_reg' => $this->input->post('no_reg'),
			'perawatan' => $this->input->post('perawatan'),
			'jumlah_perawatan' => $jumlah_perawatan,
			'biaya_radiologi' => $biaya_radiologi,
			'biaya_labor' => $biaya_labor,
			'biaya_ekg' => $biaya_ekg,
			'biaya_bdrs' => $biaya_bdrs,
			'jumlah_tindakan' => $jumlah_tindakan,
			'total_pendapatan' => $total_pendapatan,
			'date_created' => time(),
		];
		return $this->db->insert('rawatinap', $data);
	}

	public function getDataRawatInap($id=null, $tgl_mulai=null, $tgl_akhir=null){
		if ($id) {
			$query = "SELECT * FROM rawatinap INNER JOIN pasien on rawatinap.id_pasien = pasien.id_pasien INNER JOIN unit on rawatinap.id_unit = unit.id_unit WHERE rawatinap.id_rawatinap = $id ORDER BY id_rawatinap DESC";
		}elseif($tgl_mulai && $tgl_akhir){
			$query = "SELECT * FROM rawatinap INNER JOIN pasien on rawatinap.id_pasien = pasien.id_pasien INNER JOIN unit on rawatinap.id_unit = unit.id_unit WHERE rawatinap.tanggal_rawatinap >= '$tgl_mulai' AND rawatinap.tanggal_rawatinap <= '$tgl_akhir' ORDER BY id_rawatinap DESC";
		}else{
			$query = "SELECT * FROM rawatinap INNER JOIN pasien on rawatinap.id_pasien = pasien.id_pasien INNER JOIN unit on rawatinap.id_unit = unit.id_unit ORDER BY id_rawatinap DESC";
		}
		return $this->db->query($query);
	}

	public function getFilterDataRawatInap($id_unit){
		$query = "SELECT * FROM rawatinap INNER JOIN pasien on rawatinap.id_pasien = pasien.id_pasien INNER JOIN unit on rawatinap.id_unit = unit.id_unit WHERE rawatinap.id_unit = $id_unit ORDER BY id_rawatinap DESC";
		return $this->db->query($query);
	}

	public function sumTotalPendapatanRawatInap($id=null, $tgl_mulai=null, $tgl_akhir=null){
		if ($id) {
			$query = "SELECT SUM(total_pendapatan) as total FROM rawatinap WHERE id_unit = $id";
		}elseif($tgl_mulai && $tgl_akhir){
			$query = "SELECT SUM(total_pendapatan) as total FROM rawatinap WHERE tanggal_rawatinap >= '$tgl_mulai' AND tanggal_rawatinap <= '$tgl_akhir'";
		}else{
			$query = "SELECT SUM(total_pendapatan) as total FROM rawatinap";
		}
		
		return $this->db->query($query);
	}

	public function editRawatInap($id){
		$jumlah_perawatan = convert_to_number($this->input->post('jumlah_perawatan'));
		$biaya_radiologi = convert_to_number($this->input->post('biaya_radiologi'));
		$biaya_labor = convert_to_number($this->input->post('biaya_labor'));
		$biaya_ekg = convert_to_number($this->input->post('biaya_ekg'));
		$biaya_bdrs = convert_to_number($this->input->post('biaya_bdrs'));
		$jumlah_tindakan = convert_to_number($this->input->post('jumlah_tindakan'));

		$total_pendapatan = $jumlah_perawatan + $biaya_radiologi + $biaya_labor + $biaya_ekg + $biaya_bdrs +  $jumlah_tindakan;

		$data = [
			'id_pasien' => $this->input->post('id_pasien'),
			'id_unit' => $this->input->post('id_unit'),
			'tanggal_rawatinap' => $this->input->post('tanggal_rawatinap'),
			'no_reg' => $this->input->post('no_reg'),
			'perawatan' => $this->input->post('perawatan'),
			'jumlah_perawatan' => $jumlah_perawatan,
			'biaya_radiologi' => $biaya_radiologi,
			'biaya_labor' => $biaya_labor,
			'biaya_ekg' => $biaya_ekg,
			'biaya_bdrs' => $biaya_bdrs,
			'jumlah_tindakan' => $jumlah_tindakan,
			'total_pendapatan' => $total_pendapatan,
		];

		$this->db->where('id_rawatinap', $id);
		return $this->db->update('rawatinap', $data);
	}

	public function getDataRawatInapOnlyTglRawatInap($id_unit = null)
	{
		if ($id_unit) {
			$query = "SELECT DISTINCT tanggal_rawatinap FROM rawatinap WHERE id_unit = $id_unit ORDER BY tanggal_rawatinap ASC";
		}else{
			$query = "SELECT DISTINCT tanggal_rawatinap FROM rawatinap  ORDER BY tanggal_rawatinap ASC";
		}

		
		return $this->db->query($query);
	}


	public function deleteRawatInap($id){
		return $this->db->delete('rawatinap', ['id_rawatinap' => $id]);
	}
}