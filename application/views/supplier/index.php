
<div class="container-fluid">
    <div class="row">
	<div class="col-lg-12">
		<div class="card shadow mb-4 border-0">
			<div class="card-header py-3">
				<a href="#" data-toggle="modal" data-target="#tambahModal"
            class="btn btn-sm btn-primary shadow-sm">Tambah Supplier</a>

			</div>
			<div class="card-body">
                <?php if ($this->session->flashdata('info')) : ?>
                        <?php echo $this->session->flashdata('info'); ?>
                <?php endif; ?>
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama supplier</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Telpon</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($supplier->result() as $o) : ?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $o->nama; ?></td>
							<td><?php echo $o->alamat; ?></td>
							<td><?php echo $o->kota; ?></td>
							<td><?php echo $o->telp; ?></td>
							<td>
								<a href="<?php echo site_url('supplier/hapus/') . $o->id; ?>" onclick="return confirm('Data akan terhapus, Apakah Anda yakin?')" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
								<a href="" data-id="<?php echo $o->id; ?>" class="btn btn-info btn-circle btn-sm btn-ubah-sup"><i class="fa fa-edit"></i></a>
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


<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah supplier</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="" method="post">
            <div class="modal-body">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <div class="form-group">
                    <label for="nama-supplier">Nama supplier</label>
                    <input type="text" name="nama" id="nama-supplier" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control">
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
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah supplier</h5>
            <button class="close btn-ubah-close" type="button" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?php echo site_url('supplier/ubah') ?>" method="post">
            <div class="modal-body">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Nama supplier</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-ubah-close" type="button">Batal</button>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
