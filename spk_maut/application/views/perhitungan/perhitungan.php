<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Matrik Keputusan X</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							echo $data_pencocokan['nilai'];
						?>
						</td>
						<?php endforeach ?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
					<tr align="center" class="bg-light">
						<th colspan="2">Nilai A+</th>
						<?php foreach ($kriteria as $key): ?>
						<th>
						<?php 
							$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
							echo $min_max['max'];
						?>
						</th>
						<?php endforeach ?>
					</tr>
					<tr align="center" class="bg-light">
						<th colspan="2">Nilai A-</th>
						<?php foreach ($kriteria as $key): ?>
						<th>
						<?php 
							$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
							echo $min_max['min'];
						?>
						</th>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Normalisasi Matrix X</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
							$hasil= @(round(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']),4));
							echo $hasil;
						?>
						</td>
						<?php endforeach ?>
					</tr>
					
					<?php
						$no++;
						endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Bobot Kriteria</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
						echo $key->bobot;
						?>
						</td>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Perkalian Matrik Normalisasi Dengan Bobot Kriteria</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<th>Perhitungan</th>
						<th>Total Nilai Preferensi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$this->Perhitungan_model->hapus_hasil();
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<td>SUM
						<?php 
						$nilai_total = 0;
						foreach ($kriteria as $key):
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
							$hasil_normalisasi= @(round(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']),4));
							$bobot = $key->bobot;
							$nilai_total += $bobot*$hasil_normalisasi;
							
							echo "(".$bobot."x".$hasil_normalisasi.") ";
						endforeach;
						$hasil_akhir = [
							'id_alternatif' => $keys->id_alternatif,
							'nilai' => $nilai_total
						];
						$result = $this->Perhitungan_model->insert_nilai_hasil($hasil_akhir);
						?>
						</td>
						<td>
							<?= $nilai_total?>
						</td>
					</tr>
					
					<?php
						$no++;
						endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<?php
$this->load->view('layouts/footer_admin');
?>