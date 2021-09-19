<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Sub Kriteria</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<?php if ($kriteria==NULL): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Sub Kriteria</h6>
    </div>

    <div class="card-body">
		<div class="alert alert-info">
			Data masih kosong.
		</div>
	</div>
</div>
<?php endif ?>

<?php foreach ($kriteria as $key): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> <?= $key->keterangan." (".$key->kode_kriteria.")" ?></h6>
			
			<a href="#tambah<?= $key->id_kriteria ?>" data-toggle="modal" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
		</div>
    </div>
	
	<div class="modal fade" id="tambah<?= $key->id_kriteria ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah <?= $key->keterangan ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<?= form_open('Sub_kriteria/store') ?>
					<div class="modal-body">
						<input type="text" name="id_kriteria" value="<?= $key->id_kriteria ?>" hidden>
						<div class="form-group">
							<label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
							<input autocomplete="off" type="text" id="deskripsi" class="form-control" name="deskripsi" required>
						</div>
						<div class="form-group">
							<label for="nilai" class="font-weight-bold">Nilai</label>
							<input autocomplete="off" type="text" id="nilai" name="nilai" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">						
						<th width="5%">No</th>
						<th>Nama Sub Kriteria</th>
						<th>Nilai</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sub_kriteria1 = $this->Sub_Kriteria_model->data_sub_kriteria($key->id_kriteria);
						$no=1;
						foreach ($sub_kriteria1 as $key):
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $key['deskripsi'] ?></td>
						<td><?= $key['nilai'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="modal" title="Edit Data" href="#editsk<?= $key['id_sub_kriteria'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Sub_kriteria/destroy/'.$key['id_sub_kriteria']) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>

					<!-- Modal -->
					<div class="modal fade" id="editsk<?= $key['id_sub_kriteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?= $key['deskripsi'] ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Sub_kriteria/update/'.$key['id_sub_kriteria']) ?>
									<?= form_hidden('id_sub_kriteria', $key['id_sub_kriteria']) ?>
									<div class="modal-body">
										<input type="text" name="id_kriteria" value="<?= $key['id_kriteria'] ?>" hidden>
										<div class="form-group">
											<label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
											<input type="text" id="deskripsi" autocomplete="off" class="form-control" value="<?= $key['deskripsi'] ?>" name="deskripsi" required>
										</div>
										<div class="form-group">
											<label for="nilai" class="font-weight-bold">Nilai</label>
											<input type="text" autocomplete="off" id="nilai" name="nilai" class="form-control" value="<?= $key['nilai'] ?>" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
                <?php
					$no++;
					endforeach
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php endforeach ?>	  

<?php $this->load->view('layouts/footer_admin'); ?>