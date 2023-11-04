<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="col-lg-8">
		<div class="card shadow border-0 mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-dark">Form Tambah Produk</h6>
			</div>
			<div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if ($this->session->flashdata('info')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('info'); ?>
                    </div>
                    <?php endif; ?>
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
					<div class="form-group">
						<label for="kode-obat">Kode Obat</label>
						<input type="text" name="kode_obat" id="kode-obat" class="form-control" required>
					</div>
					<div class="form-group">
                        <label for="supplier">Supplier</label>
                        <?php echo form_dropdown('supplier', $supplier, set_value('supplier'), ['class' => 'form-control', 'id' => 'supllier']) ?>
					</div>
					<div class="form-group">
						<label for="nama-obat">Nama Obat</label>
						<input type="text" name="nama" id="nama-obat" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="produsen">Produsen</label>
						<input type="text" name="produsen" id="produsen" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="number" name="harga" id="harga" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="stok">Jumlah stok</label>
						<input type="number" name="stok" id="stok" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="ket">Keterangan</label>
						<input type="text" name="ket" id="ket" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="foto">Foto Produk</label>
  						<input type="file" class="form-control" name="foto" id="foto">
					</div>
					<br><br>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
