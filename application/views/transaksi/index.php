
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card shadow-lg border-0 mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
			</div>
			<div class="card-body">
				<?php if ($this->session->flashdata('info')) : ?>
					<div class="alert alert-info">
						<?php echo $this->session->flashdata('info'); ?>
					</div>
				<?php endif; ?>

				<div class="row mb-2">
					<div class="col">
						<form method="post" class="form-inline" action="<?= base_url('transaksi') ?>">
							<input type="date" id="min" name="min" class="form-control mr-3" reuired>
							<input type="date" id="max" name="max" class="form-control mr-3" reuired>
                			<button type="submit" class="btn btn-primary"> Filter </button>
						</form>
					</div>
				</div>

				<div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Tanggal Transaksi</th>
							<th>Total Bayar</th>
							<th>Uang Bayar</th>
							<th>Kembalian</th>
							<th>Nama Pembeli</th>
							<th>Obat Terjual</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($transaksi as $tr) : ?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><span class="badge badge-dark"><?php echo $tr->tgl; ?></span></td>
							<td>Rp. <?=number_format($tr->total_bayar, 0, ',', '.')?>,-</td>
							<td>Rp. <?=number_format($tr->uang_bayar, 0, ',', '.')?>,-</td>
							<td>Rp. <?=number_format($tr->kembalian, 0, ',', '.')?>,-</td>
							<td><?php echo $tr->nama_pembeli; ?></td>
							<td style="width: 200px">
                                <?php foreach ($tr->obat as $o) : ?>
                                <a href="#" class="mb-2 btn btn-success btn-sm btn-icon-split shadow-sm border-0">
                                    <span class="icon text-white-50">
                                    <?php echo $o->jumlah; ?>
                                    </span>
                                    <span class="text"><?php echo $o->nama_obat; ?></span>
                                </a><br>
                                <?php endforeach ?>
                            </td>
							<td>
								<a href="<?php echo site_url('transaksi/hapus/') . $tr->id; ?>" class="btn btn-danger btn-sm shadow-sm m-1" onclick="return confirm('Data akan terhapus, Apakah Anda yakin?')">Hapus</i></a>
								<a href="<?php echo site_url('transaksi/print/') . $tr->id; ?>" target="blank" class="btn btn-success btn-sm shadow-sm m-1">Print</i></a>
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

