<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapData_model extends CI_Model
{

	public function getRekapData($id_pasien=null, $tgl_mulai=null, $tgl_akhir=null){

		if ($tgl_mulai && $tgl_akhir) {
			$query = "SELECT * FROM pasien 
			LEFT JOIN obat on obat.id_pasien = pasien.id_pasien
			LEFT JOIN rawatinap on rawatinap.id_pasien = pasien.id_pasien
			LEFT JOIN rawatjalan on rawatjalan.id_pasien = pasien.id_pasien
			LEFT JOIN unit on unit.id_unit = rawatinap.id_unit WHERE rawatinap.tanggal_rawatinap >= '$tgl_mulai' AND rawatinap.tanggal_rawatinap <= '$tgl_akhir'";
		}elseif($id_pasien){
			$query = "SELECT * FROM pasien 
			LEFT JOIN obat on obat.id_pasien = pasien.id_pasien
			LEFT JOIN rawatinap on rawatinap.id_pasien = pasien.id_pasien
			LEFT JOIN rawatjalan on rawatjalan.id_pasien = pasien.id_pasien
			LEFT JOIN unit on unit.id_unit = rawatinap.id_unit WHERE pasien.id_pasien = $id_pasien";
		}else{
			$query = "SELECT * FROM pasien 
			LEFT JOIN obat on obat.id_pasien = pasien.id_pasien
			LEFT JOIN rawatinap on rawatinap.id_pasien = pasien.id_pasien
			LEFT JOIN rawatjalan on rawatjalan.id_pasien = pasien.id_pasien
			LEFT JOIN unit on unit.id_unit = rawatinap.id_unit";
		}
		return $this->db->query($query);
	}

	public function getUnitRawatInap($tgl_mulai=null, $tgl_akhir=null){
		$query = "SELECT DISTINCT (rawatinap.id_unit) as unitId, unit.* FROM rawatinap RIGHT JOIN unit on rawatinap.id_unit = unit.id_unit ";
		return $this->db->query($query);
	}

	public function getUnitRekapData(){
		$query = "SELECT * FROM rawatinap right join unit on unit.id_unit = rawatinap.id_unit";
		return $this->db->query($query);
	}


	public function getDataPenggunaRekap(){
		$query = "SELECT * FROM datapengguna ORDER BY id DESC LIMIT 1";
		return $this->db->query($query);
	}
}