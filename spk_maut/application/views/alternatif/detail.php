<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>

	<a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Alternatif</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>Keterangan</th>
					<td><?php echo $alternatif->keterangan ?></td>
				</tr>

				<tr>
					<th>Angkatan</th>
					<td><?php echo $alternatif->angkatan ?></td>
				</tr>

				<tr>
					<th>NIM</th>
					<td><?php echo $alternatif->nim ?></td>
				</tr>

				
				<tr>
					<th>Nama Lengkap</th>
					<td><?php echo $alternatif->nama ?></td>
				</tr>
				
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $alternatif->jenis_kelamin ?></td>
				</tr>
				
				<tr>
					<th>Jurusan</th>
					<td><?php echo $alternatif->jurusan ?></td>
				</tr>
				
				<tr>
					<th>E-Mail</th>
					<td><?php echo $alternatif->email ?></td>
				</tr>
				
				<tr>
					<th>No Telp</th>
					<td><?php echo $alternatif->no_telp ?></td>
				</tr>
				
				<tr>
					<th>Alamat</th>
					<td><?php echo $alternatif->alamat ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>