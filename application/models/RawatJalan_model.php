<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatJalan_model extends CI_Model
{

	public function addRawatJalan(){
		$rontgen = convert_to_number($this->input->post('rotgen'));
		$DR = convert_to_number($this->input->post('DR'));
		$labor = convert_to_number($this->input->post('labor'));
		$kiur = convert_to_number($this->input->post('kiur'));
		$dr1 = convert_to_number($this->input->post('dr1'));
		$pbedah = convert_to_number($this->input->post('pbedah'));
		$dr2 = convert_to_number($this->input->post('dr2'));
		$pgigi = convert_to_number($this->input->post('pgigi'));
		$dr3 = convert_to_number($this->input->post('dr3'));
		$igd = convert_to_number($this->input->post('igd'));
		$karcis = convert_to_number($this->input->post('karcis'));
		$dr4 = convert_to_number($this->input->post('dr4'));
		$pkb = convert_to_number($this->input->post('pkb'));
		$dr5 = convert_to_number($this->input->post('dr5'));
		$ptht = convert_to_number($this->input->post('ptht'));
		$dr6 = convert_to_number($this->input->post('dr6'));
		$pmata = convert_to_number($this->input->post('pmata'));
		$dr7 = convert_to_number($this->input->post('dr7'));
		$fisio = convert_to_number($this->input->post('fisio'));
		$dr8 = convert_to_number($this->input->post('dr8'));
		$panak = convert_to_number($this->input->post('panak'));
		$dr9 = convert_to_number($this->input->post('dr9'));
		$hemodia = convert_to_number($this->input->post('hemodia'));
		$dr10 = convert_to_number($this->input->post('dr10'));
		$pimu = convert_to_number($this->input->post('pimu'));
		$pvct = convert_to_number($this->input->post('pvct'));
		$visum = convert_to_number($this->input->post('visum'));
		$asuransi = convert_to_number($this->input->post('asuransi'));
		$drpparu = convert_to_number($this->input->post('drpparu'));
		$drpsaraf = convert_to_number($this->input->post('drpsaraf'));
		$pdalam = convert_to_number($this->input->post('pdalam'));
		$dr11 = convert_to_number($this->input->post('dr11'));
		$psikolog = convert_to_number($this->input->post('psikolog'));
		$drkulit = convert_to_number($this->input->post('drkulit'));
		$ambulance = convert_to_number($this->input->post('ambulance'));

		$jumlah_rawatjalan = $rontgen + $DR + $labor + $kiur + $dr1 + $pbedah + $dr2 + $pgigi + $dr3 + $igd + $karcis + $dr4 + $pkb + $dr5 + $ptht + $dr6 + $pmata + $dr7 + $fisio + $dr8 + $panak + $dr9 + $hemodia + $dr10 + $pimu + $pvct + $visum + $asuransi + $drpparu + $drpsaraf + $pdalam + $dr11 + $psikolog + $drkulit + $ambulance;

		$data = [
			'id_pasien' => $this->input->post('id_pasien'),
			'tanggal_rawatjalan' => $this->input->post('tanggal_rawatjalan'),
			'rontgen' => $rontgen,
			'dr' => $DR,
			'labor' => $labor,
			'kiur' => $kiur,
			'dr1' => $dr1,
			'pbedah' => $pbedah,
			'dr2' => $dr2,
			'pgigi' => $pgigi,
			'dr3' => $dr3,
			'igd' => $igd,
			'karcis' => $karcis,
			'dr4' => $dr4,
			'pkb' => $pkb,
			'dr5' => $dr5,
			'ptht' => $ptht,
			'dr6' => $dr6,
			'pmata' => $pmata,
			'dr7' => $dr7,
			'fisio' => $fisio,
			'dr8' => $dr8,
			'panak' => $panak,
			'dr9' => $dr9,
			'hemodia' => $hemodia,
			'dr10' => $dr10,
			'pimu' => $pimu,
			'pvct' => $pvct,
			'visum' => $visum,
			'asuransi' => $asuransi,
			'drpparu' => $drpparu,
			'drpsaraf' => $drpsaraf,
			'pdalam' => $pdalam,
			'dr11' => $dr11,
			'psikolog' => $psikolog,
			'drkulit' => $drkulit,
			'ambulance' => $ambulance,
			'jumlah_rawatjalan' => $jumlah_rawatjalan,
			'date_created' => time(),
		];
		return $this->db->insert('rawatjalan', $data);
	}

	public function getDataRawatJalan($id=null){
		if ($id) {
			$query = "SELECT * FROM rawatjalan INNER JOIN pasien on rawatjalan.id_pasien = pasien.id_pasien WHERE rawatjalan.id_rawatjalan = $id ORDER BY id_rawatjalan DESC";
		}else{
			$query = "SELECT * FROM rawatjalan INNER JOIN pasien on rawatjalan.id_pasien = pasien.id_pasien ORDER BY id_rawatjalan DESC";
		}
		return $this->db->query($query);
	}

	public function getFilterDataRawatInap($id_unit){
		$query = "SELECT * FROM rawatjalan INNER JOIN pasien on rawatjalan.id_pasien = pasien.id_pasien INNER JOIN unit on rawatjalan.id_unit = unit.id_unit WHERE rawatjalan.id_unit = $id_unit ORDER BY id_rawatinap DESC";
		return $this->db->query($query);
	}

	public function sumTotalRawatJalan($tgl_mulai=null, $tgl_akhir = null){
		if ($tgl_mulai && $tgl_akhir) {
			$query = "SELECT SUM(jumlah_rawatjalan) as total FROM rawatjalan WHERE tanggal_rawatjalan >= '$tgl_mulai' AND tanggal_rawatjalan <= '$tgl_akhir'";
		}else{
			$query = "SELECT SUM(jumlah_rawatjalan) as total FROM rawatjalan";
		}
		return $this->db->query($query);
	}

	public function getDataRawatJalanOnlyTglRawat()
	{
		$query = "SELECT DISTINCT tanggal_rawatjalan FROM rawatjalan ORDER BY tanggal_rawatjalan ASC";
		return $this->db->query($query);
	}

	public function editRawatJalan($id){
		$rontgen = convert_to_number($this->input->post('rotgen'));
		$DR = convert_to_number($this->input->post('DR'));
		$labor = convert_to_number($this->input->post('labor'));
		$kiur = convert_to_number($this->input->post('kiur'));
		$dr1 = convert_to_number($this->input->post('dr1'));
		$pbedah = convert_to_number($this->input->post('pbedah'));
		$dr2 = convert_to_number($this->input->post('dr2'));
		$pgigi = convert_to_number($this->input->post('pgigi'));
		$dr3 = convert_to_number($this->input->post('dr3'));
		$igd = convert_to_number($this->input->post('igd'));
		$karcis = convert_to_number($this->input->post('karcis'));
		$dr4 = convert_to_number($this->input->post('dr4'));
		$pkb = convert_to_number($this->input->post('pkb'));
		$dr5 = convert_to_number($this->input->post('dr5'));
		$ptht = convert_to_number($this->input->post('ptht'));
		$dr6 = convert_to_number($this->input->post('dr6'));
		$pmata = convert_to_number($this->input->post('pmata'));
		$dr7 = convert_to_number($this->input->post('dr7'));
		$fisio = convert_to_number($this->input->post('fisio'));
		$dr8 = convert_to_number($this->input->post('dr8'));
		$panak = convert_to_number($this->input->post('panak'));
		$dr9 = convert_to_number($this->input->post('dr9'));
		$hemodia = convert_to_number($this->input->post('hemodia'));
		$dr10 = convert_to_number($this->input->post('dr10'));
		$pimu = convert_to_number($this->input->post('pimu'));
		$pvct = convert_to_number($this->input->post('pvct'));
		$visum = convert_to_number($this->input->post('visum'));
		$asuransi = convert_to_number($this->input->post('asuransi'));
		$drpparu = convert_to_number($this->input->post('drpparu'));
		$drpsaraf = convert_to_number($this->input->post('drpsaraf'));
		$pdalam = convert_to_number($this->input->post('pdalam'));
		$dr11 = convert_to_number($this->input->post('dr11'));
		$psikolog = convert_to_number($this->input->post('psikolog'));
		$drkulit = convert_to_number($this->input->post('drkulit'));
		$ambulance = convert_to_number($this->input->post('ambulance'));

		$jumlah_rawatjalan = $rontgen + $DR + $labor + $kiur + $dr1 + $pbedah + $dr2 + $pgigi + $dr3 + $igd + $karcis + $dr4 + $pkb + $dr5 + $ptht + $dr6 + $pmata + $dr7 + $fisio + $dr8 + $panak + $dr9 + $hemodia + $dr10 + $pimu + $pvct + $visum + $asuransi + $drpparu + $drpsaraf + $pdalam + $dr11 + $psikolog + $drkulit + $ambulance;

		$data = [
			'id_pasien' => $this->input->post('id_pasien'),
			'tanggal_rawatjalan' => $this->input->post('tanggal_rawatjalan'),
			'rontgen' => $rontgen,
			'dr' => $DR,
			'labor' => $labor,
			'kiur' => $kiur,
			'dr1' => $dr1,
			'pbedah' => $pbedah,
			'dr2' => $dr2,
			'pgigi' => $pgigi,
			'dr3' => $dr3,
			'igd' => $igd,
			'karcis' => $karcis,
			'dr4' => $dr4,
			'pkb' => $pkb,
			'dr5' => $dr5,
			'ptht' => $ptht,
			'dr6' => $dr6,
			'pmata' => $pmata,
			'dr7' => $dr7,
			'fisio' => $fisio,
			'dr8' => $dr8,
			'panak' => $panak,
			'dr9' => $dr9,
			'hemodia' => $hemodia,
			'dr10' => $dr10,
			'pimu' => $pimu,
			'pvct' => $pvct,
			'visum' => $visum,
			'asuransi' => $asuransi,
			'drpparu' => $drpparu,
			'drpsaraf' => $drpsaraf,
			'pdalam' => $pdalam,
			'dr11' => $dr11,
			'psikolog' => $psikolog,
			'drkulit' => $drkulit,
			'ambulance' => $ambulance,
			'jumlah_rawatjalan' => $jumlah_rawatjalan,
		];

		$this->db->where('id_rawatjalan', $id);
		return $this->db->update('rawatjalan', $data);
	}

	public function deleteRawatJalan($id){
		return $this->db->delete('rawatjalan', ['id_rawatjalan' => $id]);
	}
}