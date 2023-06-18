<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{

	public function addObat($userId){
		$data = [
			'id_pasien' => $this->input->post('id_pasien'),
			'tgl_penjualan' => $this->input->post('tgl_penjualan'),
			'jumlah' => convert_to_number($this->input->post('jumlah')),
			'user_id' => $userId,
			'date_created' => time(),
		];

		return $this->db->insert('obat', $data);
	}

	public function getDataObat($id=null, $order = ''){
		if ($id) {
			$query = "SELECT * FROM obat WHERE id_obat = $id";
		}elseif($order == 'ASC'){
			$query = "SELECT * FROM obat LEFT JOIN pasien on obat.id_pasien = pasien.id_pasien ORDER BY tgl_penjualan ASC";
		}else{
			$query = "SELECT * FROM obat LEFT JOIN pasien on obat.id_pasien = pasien.id_pasien ORDER BY tgl_penjualan DESC";
		}
		return $this->db->query($query);
	}

	public function getDataObatOnlyTglPenjualan()
	{
		$query = "SELECT DISTINCT tgl_penjualan FROM obat ORDER BY tgl_penjualan ASC";
		return $this->db->query($query);
	}

	public function sumTotalObat($tgl_mulai=null, $tgl_akhir=null){
		if ($tgl_mulai && $tgl_akhir) {
			$query = "SELECT SUM(jumlah) as total FROM obat WHERE tgl_penjualan >= '$tgl_mulai' AND tgl_penjualan <= '$tgl_akhir'";
		}else{
			$query = "SELECT SUM(jumlah) as total FROM obat";
		}
		return $this->db->query($query);
	}

	public function editObat($id){
		$data = [
			'id_pasien' => $this->input->post('id_pasien'),
			'tgl_penjualan' => $this->input->post('tgl_penjualan'),
			'jumlah' => convert_to_number($this->input->post('jumlah'))
		];

		$this->db->where('id_obat', $id);

		return $this->db->update('obat', $data);
	}

	public function deleteObat($id){
		return $this->db->delete('obat', ['id_obat' => $id]);
	}
}