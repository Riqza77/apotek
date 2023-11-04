
<div class="container-fluid">
    <div class="row">
	<div class="col-lg-12">
		<div class="card shadow mb-4 border-0">
			<div class="card-header py-3">
				<a href="#" data-toggle="modal" data-target="#tambahModal"
			class="btn btn-sm btn-primary">Tambah Admin</a>
			</div>
			<div class="card-body">
				<?php if ($this->session->flashdata('info')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('info'); ?>
				</div>
				<?php endif; ?>
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama admin</th>
							<th>Username</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($admin->result() as $o) : ?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $o->nama; ?></td>
							<td><?php echo $o->username; ?></td>
							<td>
								<a href="<?php echo site_url('admin/hapus/') . $o->id; ?>"
									class="btn btn-danger btn-sm">Hapus</a>
								<a href="" data-id="<?php echo $o->id; ?>"
									class="btn btn-info btn-sm">Ubah</a>
							</td>
						</tr>
					</tbody>
					<?php endforeach ?>
				</table>
			</div>
		</div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?php echo site_url('admin'); ?>" method="post">
				<div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
					<div class="form-group">
						<label for="t-nama-admin">Nama</label>
						<input type="text" name="nama" id="t-nama-admin" class="form-control">
					</div>
					<div class="form-group">
						<label for="t-username">Username</label>
						<input type="text" name="username" id="t-username" class="form-control">
					</div>
					<div class="form-group">
						<label for="t-password">Password</label>
						<input type="password" name="password" id="t-password" class="form-control">
					</div>
					<div class="form-group">
						<label for="t-role">Role</label>
						<input type="text" name="role" id="t-role" class="form-control">
					</div>
					<div class="form-group">
						<label for="t-pnggn">Pengguna</label>
						<input type="text" name="pengguna" id="t-pnggn" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Admin</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?php echo site_url('admin/ubah') ?>" class="form-admin" method="post">
				<input type="hidden" id="id" name="id">
				<div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
					<div class="form-group">
						<label for="nama-admin">Nama</label>
						<input type="text" name="nama" id="nama-admin" class="form-control">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control">
						<small class="text-success light">Kosongkan jika tidak ingin merubah password</small>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
