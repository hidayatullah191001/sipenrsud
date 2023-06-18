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
	
	<?php foreach ($rawatjalan_tanggal_jalan as $rtj): ?>
		<h2><b><?=$title ?> <?=date('d F Y', strtotime($rtj['tanggal_rawatjalan'])) ?></b></h2>
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Pasien</th>
					<th>Tanggal Rawat Jalan</th>
					<th>Rotgen</th>
					<th>DR</th>
					<th>Labor</th>
					<th>Kiur</th>
					<th>dr</th>
					<th>P.Bedah</th>
					<th>dr</th>
					<th>p.Gigi</th>
					<th>dr</th>
					<th>IGD</th>
					<th>Karcis</th>
					<th>dr</th>
					<th>P.Kb</th>
					<th>dr</th>
					<th>P.THT</th>
					<th>dr</th>
					<th>P.Mata</th>
					<th>dr</th>
					<th>Fisio</th>
					<th>dr</th>
					<th>P.Anak</th>
					<th>dr</th>
					<th>Hemodia</th>
					<th>dr</th>
					<th>P.IMU</th>
					<th>P.VCT</th>
					<th>Visum</th>
					<th>Asuransi</th>
					<th>dr P.Paru</th>
					<th>dr P.Saraf</th>
					<th>P.Dalam</th>
					<th>dr</th>
					<th>psikolog</th>
					<th>dr Kulit</th>
					<th>Ambulance</th>
					<th>Biaya Rawat Jalan</th>
				</tr>
			</thead>
			<tbody> 
				<?php 
				$i = 1;
				$sumJumlah = 0;
				foreach ($rawatjalans as $rawatjalan) : ?>
					<?php if ($rawatjalan['tanggal_rawatjalan'] == $rtj['tanggal_rawatjalan']): ?>
						<tr>
							<td><?=$i++; ?></td>
							<td><?=$rawatjalan['nama'] ?></td>
							<td><?=date('d F Y', strtotime($rawatjalan['tanggal_rawatjalan']))?></td>
							<td><?=rupiah($rawatjalan['rontgen']) ?></td>
							<td><?=rupiah($rawatjalan['dr']) ?></td>
							<td><?=rupiah($rawatjalan['labor']) ?></td>
							<td><?=rupiah($rawatjalan['kiur']) ?></td>
							<td><?=rupiah($rawatjalan['dr1']) ?></td>
							<td><?=rupiah($rawatjalan['pbedah']) ?></td>
							<td><?=rupiah($rawatjalan['dr2']) ?></td>
							<td><?=rupiah($rawatjalan['pgigi']) ?></td>
							<td><?=rupiah($rawatjalan['dr3']) ?></td>
							<td><?=rupiah($rawatjalan['igd']) ?></td>
							<td><?=rupiah($rawatjalan['karcis']) ?></td>
							<td><?=rupiah($rawatjalan['dr4']) ?></td>
							<td><?=rupiah($rawatjalan['pkb']) ?></td>
							<td><?=rupiah($rawatjalan['dr5']) ?></td>
							<td><?=rupiah($rawatjalan['ptht']) ?></td>
							<td><?=rupiah($rawatjalan['dr']) ?></td>
							<td><?=rupiah($rawatjalan['pmata']) ?></td>
							<td><?=rupiah($rawatjalan['dr7']) ?></td>
							<td><?=rupiah($rawatjalan['fisio']) ?></td>
							<td><?=rupiah($rawatjalan['dr8']) ?></td>
							<td><?=rupiah($rawatjalan['panak']) ?></td>
							<td><?=rupiah($rawatjalan['dr9']) ?></td>
							<td><?=rupiah($rawatjalan['hemodia']) ?></td>
							<td><?=rupiah($rawatjalan['dr10']) ?></td>
							<td><?=rupiah($rawatjalan['pimu']) ?></td>
							<td><?=rupiah($rawatjalan['pvct']) ?></td>
							<td><?=rupiah($rawatjalan['visum']) ?></td>
							<td><?=rupiah($rawatjalan['asuransi']) ?></td>
							<td><?=rupiah($rawatjalan['drpparu']) ?></td>
							<td><?=rupiah($rawatjalan['drpsaraf']) ?></td>
							<td><?=rupiah($rawatjalan['pdalam']) ?></td>
							<td><?=rupiah($rawatjalan['dr11']) ?></td>
							<td><?=rupiah($rawatjalan['psikolog']) ?></td>
							<td><?=rupiah($rawatjalan['drkulit']) ?></td>
							<td><?=rupiah($rawatjalan['ambulance']) ?></td>
							<td><?=rupiah($rawatjalan['jumlah_rawatjalan']) ?></td>
						</tr>
						<?php $sumJumlah += $rawatjalan['jumlah_rawatjalan'] ?>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<th colspan="38">Total Pendapatan Rawat Jalan</th>
				<th><?=rupiah($sumJumlah) ?></th>
			</tfoot>
		</table>
	<?php endforeach ?>
	<h5>Total Pendapatan Rawat Jalan : <?=rupiah($sum_rawatjalan['total'] ) ?></h5>
</body>
</html>