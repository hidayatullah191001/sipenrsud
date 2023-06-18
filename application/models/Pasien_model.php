<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

	public function addPasien($userId){
		$data = [
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('usia'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'date_created' => time(),
		];
		return $this->db->insert('pasien', $data);
	}

	public function getDataPasien($id=null){
		if ($id) {
			$query = "SELECT * FROM pasien WHERE id_pasien = $id";
		}else{
			$query = "SELECT * FROM pasien ORDER BY id_pasien DESC";
		}
		return $this->db->query($query);
	}

	public function sumTotalSetoran(){
		$query = "SELECT SUM(jumlah_setoran) as total FROM pasien";
		return $this->db->query($query);
	}

	public function editPasien($id){
		$data = [
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('usia'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
		];
		$this->db->where('id_pasien', $id);
		return $this->db->update('pasien', $data);
	}

	public function deletePasien($id){
		return $this->db->delete('pasien', ['id_pasien' => $id]);
	}
}