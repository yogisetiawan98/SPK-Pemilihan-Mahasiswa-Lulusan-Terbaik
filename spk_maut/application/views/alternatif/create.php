<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>

	<a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data Alternatif</h6>
    </div>
	
	<?php echo form_open('Alternatif/store'); ?>
		<div class="card-body">
			<div class="row">
			<div class="form-group col-md-6">
					<label class="font-weight-bold">Keterangan</label>
					<select name="keterangan" class="form-control" required>
						<option value="">--Pilih Status--</option>
						<option value="Aktif">Aktif</option>
						<option value="Tidak Aktif">Tidak Aktif</option>						
					</select>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Angkatan</label>
					<input autocomplete="off" type="text" name="angkatan" required class="form-control"/>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIM</label>
					<input autocomplete="off" type="text" name="nim" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama</label>
					<input autocomplete="off" type="text" name="nama" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control" required>
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>						
					</select>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jurusan</label>
					<select name="jurusan" class="form-control" required>
						<option value="">--Pilih Jurusan--</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Sistem Informasi">Sistem Informasi</option>						
					</select>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">E-Mail</label>
					<input autocomplete="off" type="email" name="email" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nomor Telp</label>
					<input autocomplete="off" type="number" name="no_telp" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Alamat Lengkap</label>
					<input autocomplete="off" type="text" name="alamat" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>