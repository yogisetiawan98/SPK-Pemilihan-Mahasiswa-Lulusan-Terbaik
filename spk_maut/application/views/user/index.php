<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Data User</h1>

    <a href="<?= base_url('User/create'); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data User</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>E-mail</th>
						<th>Username</th>
						<th>Level</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($list as $data => $value) { ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?php echo $value->nama ?></td>
						<td><?php echo $value->email ?></td>
						<td><?php echo $value->username ?></td>
						<td>
						<?php
						foreach ($user_level as $k) {
							if($k->id_user_level == $value->id_user_level){
								echo $k->user_level;
							}
						}
						?>
						</td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="<?=base_url('User/show/'.$value->id_user)?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?=base_url('User/edit/'.$value->id_user)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=base_url('User/destroy/'.$value->id_user)?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>
					<?php
					$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php $this->load->view('layouts/footer_admin'); ?>