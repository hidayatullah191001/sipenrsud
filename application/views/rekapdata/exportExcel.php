<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$titleFile.xls");
	?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$title ?>	</title>
</head>

<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		table{
			margin: 20px auto;
			border-collapse: collapse;
		}
		table th,
		table td{
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}
		a{
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<table>
		<tbody>
			<tr>
				<td style="border : 0px; padding:10px; align-items: center" rowspan="3"><img width="70" src="<?=base_url('assets/assets/images/logo.jpg') ?>"></td>
				<td colspan="5" style="text-align: center; border : 0px; padding: 0px"><h2 style="margin: 0px">PEMERINTAH KABUPATEN LAHAT</h2></td>
			</tr>
			<tr>
				<td colspan="5" style="text-align: center; border : 0px; padding: 0px;"><h4 style="margin: 0px">LAPORAN PERTANGGUNG JAWABAN BENDAHARA PENERIMA SKPD</h4></td>
			</tr>
			<tr>
				<td colspan="5" style="text-align: center; border : 0px; padding: 0px"><h4 style="margin: 0px">( SPJ PENDAPATAN - FUNGSIONAL )</h4></td>
			</tr>
		</tbody>
	</table>

	<br><br>

	<table>
		<tbody>
			<tr>
				<td style="border : 0px">Urusan Pemerintahan</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px">Urusan Wajib</td>
			</tr>
			<tr>
				<td style="border : 0px">Bidang Pemerintahan</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px">Kesehatan</td>
			</tr>
			<tr>
				<td style="border : 0px">Unit Organisasi</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px">Rumah Sakit UMUM Daerah</td>
			</tr>
			<tr>
				<td style="border : 0px">Sub Unit Organisasi</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px">Badan Layanan Umum Daerah (RSUD)</td>
			</tr>
			<tr>
				<td style="border : 0px">Pengguna Anggaran</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px"><?=$datapengguna['pengguna_anggaran'] ?></td>
			</tr>
			<tr>
				<td style="border : 0px">Bendahara Penerimaan</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px"><?=$datapengguna['bendahara_penerimaan'] ?></td>
			</tr>
			<tr>
				<td style="border : 0px">Bulan</td>
				<td style="border : 0px">:</td>
				<td style="border : 0px"><?=date('d F y', strtotime($_GET['tgl_mulai'])) ?> - <?=date('d F y', strtotime($_GET['tgl_akhir'])) ?></td>
			</tr>
		</tbody>
	</table>

	<br><br>

	<table>
		<thead>
			<tr>
				<th style="border:1px solid #3c3c3c">Uraian</th>
				<th style="border:1px solid #3c3c3c">Penerimaan</th>
				<th style="border:1px solid #3c3c3c">Penyetoran</th>
				<th style="border:1px solid #3c3c3c">Sisa</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$pendapatanJasa = $sum_rawatinap['total'] + $sum_rawatjalan['total'];
			$pendapatanLain = $sum_parkir['total'] + $sum_obat['total'];
			$totalPendapatan = $pendapatanJasa + $pendapatanLain;
			?>

			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">PENDAPATAN ASLI DAERAH</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>


			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">Lain-lain PAD yang Sah</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>


			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">Pendapatan BLUD</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>

			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">Pendapatan Jasa Layanan Umum BLUD</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah($pendapatanJasa) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah($pendapatanJasa) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<?php foreach ($units as $unit): ?>
				<tr>
					<td style="border:1px solid #3c3c3c">Ruang Inap <?=$unit['nama_unit'] ?></td>
					<?php 
					$sumTotalPendapatan = 0;
					foreach ($rawatinaps as $rawatinap): ?>
						<?php if ($unit['unitId'] == $rawatinap['id_unit']): ?>
							<?php $sumTotalPendapatan += $rawatinap['total_pendapatan'] ?>
						<?php endif ?>
					<?php endforeach ?>
					<td style="border:1px solid #3c3c3c"><?=rupiah($sumTotalPendapatan) ?></td>
					<td style="border:1px solid #3c3c3c"><?=rupiah($sumTotalPendapatan) ?></td>
					<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td style="border:1px solid #3c3c3c">Pendapatan Rawat Jalan</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(($sum_rawatjalan['total'] == null) ? 0 : $sum_rawatjalan['total']) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(($sum_rawatjalan['total'] == null) ? 0 : $sum_rawatjalan['total']) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>

			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">Hibah</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Hibah Terikat</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Hibah Tidak Terikat</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>

			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">Kerja Sama</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Pendapatan Kerjasama Operasional</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>

			<tr style="font-weight: bold">
				<td style="border:1px solid #3c3c3c">Lain-Lain Pendapatan BLUD yang sah</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah($pendapatanLain) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah($pendapatanLain) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Pendapatan Jasa Giro</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Hasil Sewa Menyewa</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Penjualan Obat-obatan</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(($sum_obat['total'] == null) ? 0 : $sum_obat['total']) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(($sum_obat['total'] == null) ? 0 : $sum_obat['total']) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Penjualan Alat Kesehatan Habis Pakai</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Parkir</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(($sum_parkir['total'] == null) ? 0 : $sum_parkir['total']) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(($sum_parkir['total'] == null) ? 0 : $sum_parkir['total']) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Diklat dan Pelatihan</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Pendapatan Lainnya</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #3c3c3c">Pendapatan Bantuan Pemerintah</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
			
		</tbody>
		<tfoot>
			<tr style="text-align: center;">
				<td style="border:1px solid #3c3c3c">Jumlah</td>
				<td style="border:1px solid #3c3c3c"><?=rupiah($totalPendapatan) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah($totalPendapatan) ?></td>
				<td style="border:1px solid #3c3c3c"><?=rupiah(0) ?></td>
			</tr>
		</tfoot>
	</table>
</body>
</html>