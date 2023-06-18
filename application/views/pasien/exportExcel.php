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


	<center>
		<h1><b><?=$title ?></b></h1>
	</center>
	
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Umur</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			foreach ($pasiens as $pasien) : ?>
				<tr>
					<td><?=$i++; ?></td>
					<td><?=$pasien['nama'] ?></td>
					<td><?=$pasien['umur'] ?></td>
					<td><?=$pasien['jenis_kelamin'] ?></td>
					<td><?=elipsisText($pasien['alamat'])?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>