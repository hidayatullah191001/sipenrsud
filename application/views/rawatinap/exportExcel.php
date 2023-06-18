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

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$titleFile.xls");
	?>

	<?php foreach ($rawatinap_tanggal_inap as $rti): ?>
		<h2><b><?=$title ?> <?=date('d F Y', strtotime($rti['tanggal_rawatinap'])) ?></b></h2>
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Pasien</th>
					<th>Unit</th>
					<th>Tanggal Rawat Inap</th>
					<th>No Registrasi</th>
					<th>Perawatan</th>
					<th>Biaya Perawatan</th>
					<th>Biaya Radiologi</th>
					<th>Biaya Labor</th>
					<th>Biaya EKG</th>
					<th>Biaya BDRS</th>
					<th>Biaya Tindakan</th>
					<th>Total Pendapatan</th>
				</tr>
			</thead>
			<tbody> 
				<?php 
				$i = 1;
				$sumJumlah = 0;
				foreach ($rawatinaps as $rawatinap) : ?>
					<?php if ($rawatinap['tanggal_rawatinap'] == $rti['tanggal_rawatinap']): ?>
						<tr>
							<td><?=$i++; ?></td>
							<td><?=$rawatinap['nama'] ?></td>
							<td><?=$rawatinap['nama_unit'] ?></td>
							<td><?=date('d F Y', strtotime($rawatinap['tanggal_rawatinap']))?></td>
							<td><?=$rawatinap['no_reg'] ?></td>
							<td><?=$rawatinap['perawatan'] ?></td>
							<td><?=rupiah($rawatinap['jumlah_perawatan']) ?></td>
							<td><?=rupiah($rawatinap['biaya_radiologi']) ?></td>
							<td><?=rupiah($rawatinap['biaya_labor']) ?></td>
							<td><?=rupiah($rawatinap['biaya_ekg']) ?></td>
							<td><?=rupiah($rawatinap['biaya_bdrs']) ?></td>
							<td><?=rupiah($rawatinap['jumlah_tindakan']) ?></td>
							<td><?=rupiah($rawatinap['total_pendapatan']) ?></td>
						</tr>
						<?php $sumJumlah =+ $rawatinap['total_pendapatan'] ?>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<th colspan="12">Pendapatan Rawat Inap</th>
				<th><?=rupiah($sumJumlah) ?></th>
			</tfoot>
		</table>

	<?php endforeach ?>
	<h5>Total Pendapatan Rawat Inap : <?=rupiah($sum_rawatinap['total']) ?></h5>
	
</body>
</html>