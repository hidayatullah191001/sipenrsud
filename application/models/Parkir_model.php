<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parkir_model extends CI_Model
{

	public function addParkir($userId){
		$data = [
			'tgl_setor' => $this->input->post('tgl_setor'),
			'tgl_setoran' => $this->input->post('tgl_setoran'),
			'jumlah_setoran' => $this->input->post('jumlah_setoran'),
			'user_id' => $userId,
			'date_created' => time(),
		];

		return $this->db->insert('parkir', $data);
	}

	public function getDataParkir($id=null){
		if ($id) {
			$query = "SELECT * FROM parkir WHERE id_parkir = $id";
		}else{
			$query = "SELECT * FROM parkir ORDER BY id_parkir ASC";
		}
		return $this->db->query($query);
	}

	public function sumTotalSetoran($tgl_mulai=null, $tgl_akhir=null){
		if ($tgl_mulai && $tgl_akhir) {
			$query = "SELECT SUM(jumlah_setoran) as total FROM parkir WHERE tgl_setor >= '$tgl_mulai' AND tgl_setor <= '$tgl_akhir'";
		}else{
			$query = "SELECT SUM(jumlah_setoran) as total FROM parkir";
		}
		return $this->db->query($query);
	}

	public function editParkir($id){
		$data = [
			'tgl_setor' => $this->input->post('tgl_setor'),
			'tgl_setoran' => $this->input->post('tgl_setoran'),
			'jumlah_setoran' => convert_to_number($this->input->post('jumlah_setoran'))
		];

		$this->db->where('id_parkir', $id);

		return $this->db->update('parkir', $data);
	}

	public function deleteParkir($id){
		return $this->db->delete('parkir', ['id_parkir' => $id]);
	}
}