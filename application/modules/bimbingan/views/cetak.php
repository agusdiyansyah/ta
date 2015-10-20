<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css" media="screen">
</style>
</head>
<body>
	<table>
		<tr>
			<td width="100px">Nama</td>
			<td><?php echo $mhs->nama ?></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td><?php echo $mhs->nim ?></td>
		</tr>
		<tr>
			<td valign="top">Judul TA</td>
			<td><?php echo $mhs->judul ?></td>
		</tr>
	</table>
	<br>
	<table style="border-collapse: collapse;width:100%;border:1px solid #000">
		<thead>
			<tr style="border:1px solid #000">
				<th style="border:1px solid #000">No</th>
				<th style="border:1px solid #000">Tanggal</th>
				<th style="border:1px solid #000">Materi Asistensi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1; 
				foreach ($asis as $data): ?>
				<tr style="border:1px solid #000">
					<td style="text-align:center;border:1px solid #000"><?php echo $no; $no++; ?></td>
					<td style="text-align:center;border:1px solid #000"><?php echo $data->date ?></td>
					<td style="border:1px solid #000"><b>(<?php echo $data->t_name ?>)</b> <?php echo $data->p_name ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>