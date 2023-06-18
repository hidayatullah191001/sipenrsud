<!DOCTYPE html>
<html>
<head>
	<title>Export PDF</title>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		table{
			margin-bottom: 20px;
			border-collapse: collapse;
			font-size: 12px;
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

</head>
<body>
	<table style="margin: auto">
		<tr>
			<td style="border : 0px; padding:10px; align-items: center" rowspan="3">
				<img width="70" src="<?=base_url('assets/assets/images/logo.jpg') ?>">
			</td>
		</tr>
		<tr>
			<td colspan="5" style="text-align: center; border : 0px; padding: 0px;">
				<h2 style="margin: 0px">PEMERINTAH KABUPATEN LAHAT</h2>
				<h4 style="margin: 0px">LAPORAN PERTANGGUNG JAWABAN BENDAHARA PENERIMA SKPD</h4>
				<h4 style="margin: 0px">( SPJ PENDAPATAN - FUNGSIONAL )</h4>
			</td>
		</tr>
	</table>
	<br><br>
	<table>
		<thead>
			<tr>
				<th colspan="4">Data Pribadi Pasien</th>
			</tr>
			<tr>
				<th>Nama Lengkap</th>
				<th>Umur</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=$pasien['nama'] ?></td>
				<td><?=$pasien['umur'] ?></td>
				<td><?=$pasien['jenis_kelamin'] ?></td>
				<td><?=$pasien['alamat'] ?></td>
			</tr>
		</tbody>
	</table>

	<?php if (count($rawatinaps) > 0): ?>
		<table>
			<thead>
				<tr>
					<th colspan="7">Data Riwayat Pasien - Rawat Inap</th>
				</tr>
				<tr>
					<th>No Registrasi</th>
					<th>Unit</th>
					<th>Tanggal Rawat Inap</th>
					<th>Jenis Perawatan</th>
					<th>Biaya Perawatan</th>
					<th>Biaya Tindakan</th>
					<th>Total Pendapatan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rawatinaps as $rawatinap): ?>
					<?php if ($pasien['id_pasien'] == $rawatinap['id_pasien']): ?>
						<tr>
							<td><?=$rawatinap['no_reg'] ?></td>
							<td><?=$rawatinap['nama_unit'] ?></td>
							<td><?=date('d F Y', strtotime($rawatinap['tanggal_rawatinap'])) ?></td>
							<td><?=$rawatinap['perawatan'] ?></td>
							<td><?=rupiah($rawatinap['jumlah_perawatan']) ?></td>
							<td><?=rupiah($rawatinap['jumlah_tindakan']) ?></td>
							<td><?=rupiah($rawatinap['total_pendapatan']) ?></td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
				
			</tbody>
		</table>
	<?php endif ?>
	

	<?php if (count($rawatjalans) > 0): ?>
		<table>
			<thead>
				<tr>
					<th colspan="2">Data Riwayat Pasien - Rawat Jalan</th>
				</tr>
				<tr>
					<th>Tanggal Rawat Jalan</th>
					<th>Biaya Rawat Jalan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rawatjalans as $rawatjalan): ?>
					<?php if ($pasien['id_pasien'] == $rawatjalan['id_pasien']): ?>
						<tr>
							<td><?=date('d F y', strtotime($rawatjalan['tanggal_rawatjalan']))?></td>
							<td><?=rupiah($rawatjalan['jumlah_rawatjalan']) ?></td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif ?>
	

	<?php if (count($obats) > 0): ?>
		<table>
			<thead>
				<tr>
					<th colspan="2">Data Obat Pasien</th>
				</tr>
				<tr>
					<th>Tanggal Penjualan</th>
					<th>Biaya Obat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($obats as $obat): ?>
					<?php if ($obat['id_pasien'] == $pasien['id_pasien']): ?>
						<tr>
							<td><?=date('d F y', strtotime($obat['tgl_penjualan'])) ?></td>
							<td><?=rupiah($obat['jumlah']) ?></td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif ?>

</body>
</html>