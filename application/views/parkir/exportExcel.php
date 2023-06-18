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


	<center>
		<h1><b><?=$title ?></b></h1>
	</center>
	
	<table border="1">
		<thead>
          <tr>
            <th>No</th>
            <th>Tanggal Setor</th>
            <th>Tanggal Setoran</th>
            <th>Jumlah Setoran</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach ($parkirs as $parkir) : ?>
            <tr>
              <td><?=$i++; ?></td>
              <td><?=date('d/m/Y', strtotime($parkir['tgl_setor'])) ?></td>
              <td><?=date('d/m/Y', strtotime($parkir['tgl_setoran'])) ?></td>
              <td><?=rupiah($parkir['jumlah_setoran']) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <th colspan="3">Total setoran</th>
          <th><?=rupiah($sum_parkir['total']) ?></th>
        </tfoot>
	</table>
</body>
</html>