<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Metode MAUT</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    /* table, th, td {
        border: 1px solid black;
    } */
	.line-title {
		border: 0;
		border-style: inset;
		border-top: 1px solid #000;
		margin-top: 15px;
	}
</style>
<body>
	<img src="assets/img/download.jpg" alt="Logo STMIK Antar Bangsa" style="position: absolute; width: 70px; height: 65px;">
	<table style="width: 100%;">
	<tr>
		<td align="center">
			<span style="line-height: 1.7; font-weight: bold;">
		SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER
		<br>TANGGERANG, INDONESIA
			</span>
		</td>
	</tr>
</table>

<hr class="line-title">
<p align="center">
	LAPORAN DATA MAHASISWA <br>
	<b>Angkatan 2017 / 2018</b>
</p>

<table border="1" width="100%">
	<thead>
		<tr align="center">
			<th>Nim</th>
			<th>Alternatif / Nama Mahasiswa</th>
			<th>Jurusan</th>
			<th>Nilai Preferensi</th>
			<th width="15%">Ranking</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach ($hasil as $keys): ?>
		<tr align="center">
			<td style="padding-left: 5px;">
				<?php
				$nim_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
				echo $nim_alternatif['nim'];
				?>

			<td align="left" style="padding-left: 5px;">
				<?php
				$nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
				echo $nama_alternatif['nama'];
				?>

		<td style="padding-left: 5px;">
				<?php
				$jurusan_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
				echo $jurusan_alternatif['jurusan'];
				?>

		
			
			</td>
			<td><?= $keys->nilai ?></td>
			<td><?= $no; ?></td>
		</tr>
		<?php
			$no++;
			endforeach ?>
	</tbody>
</table>
</body>
</html>