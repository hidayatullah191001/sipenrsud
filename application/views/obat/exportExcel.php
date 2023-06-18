<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
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

	<?php foreach ($obat_tgl_penjualan as $obat): ?>
		<br>
		<p style="margin: 0px"><?=$title?></p>
		<p style="margin: 0px"><?=date('d F Y', strtotime($obat['tgl_penjualan']))?></p>
		<br>
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				$sumJumlah = 0;
				foreach ($obats as $obat2) : ?>
					<?php if ($obat['tgl_penjualan'] == $obat2['tgl_penjualan']): ?>
						<tr>
							<td><?=$i++; ?></td>
							<td><?=$obat2['nama'] ?></td>
							<td><?=rupiah($obat2['jumlah']) ?></td>
						</tr>
						<?php $sumJumlah += $obat2['jumlah'] ?>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<th colspan="2">Total Jumlah</th>
				<th><?=rupiah($sumJumlah) ?></th>
			</tfoot>
		</table>
	<?php endforeach ?>
	<h5>Total Pendapatan Penjualan : <?=rupiah($sum_obat['total']) ?></h5>
	
</body>
</html>