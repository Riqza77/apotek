<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<?php if ($this->session->userdata('role') == 1): ?>
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo site_url('dashboard'); ?>">
				<div class="sidebar-brand-text mx-3">
					MyFarmasi
				</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php echo active_link('dashboard') ?>">
				<a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Nav Item - Charts -->
			<li class="nav-item <?php echo active_link('supplier') ?>">
				<a class="nav-link" href="<?php echo site_url('supplier'); ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Data Supplier</span></a>
			</li>


			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php echo active_link(['obat', 'obat/tambah']) ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-fw fa-medkit"></i>
					<span>Obat</span>
				</a>
				<div id="collapseTwo" class="collapse <?php echo active_link(['obat', 'obat/tambah'], 'show') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo active_link('obat') ?>" href="<?php echo site_url('obat'); ?>">Data obat</a>
						<a class="collapse-item <?php echo active_link('obat/tambah') ?>" href="<?php echo site_url('obat/tambah'); ?>">Tambah obat</a>
					</div>
				</div>
			</li>

			<li class="nav-item <?php echo active_link(['transaksi', 'transaksi/tambah']) ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
					aria-controls="collapseThree">
					&nbsp;<i class="fas fa-fw fa-user-check"></i>
					<span>Transaksi</span>
				</a>
				<div id="collapseThree" class="collapse <?php echo active_link(['transaksi', 'transaksi/tambah'], 'show') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo active_link('transaksi') ?>" href="<?php echo site_url('transaksi'); ?>">Data transaksi</a>
						<a class="collapse-item <?php echo active_link('transaksi/tambah') ?>" href="<?php echo site_url('transaksi/tambah'); ?>">Tambah transaksi</a>
					</div>
				</div>
			</li>

			<hr class="sidebar-divider d-none d-md-block">
			<?php else: ?>


			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo site_url('obat'); ?>">
				<div class="sidebar-brand-text mx-3">
					MyFarmasi
				</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php echo active_link(['obat', 'obat/tambah']) ?>">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-fw fa-medkit"></i>
					<span>Obat</span>
				</a>
				<div id="collapseTwo" class="collapse <?php echo active_link(['obat', 'obat/tambah'], 'show') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo active_link('obat') ?>" href="<?php echo site_url('obat'); ?>">Data obat</a>
						<a class="collapse-item <?php echo active_link('obat/tambah') ?>" href="<?php echo site_url('obat/tambah'); ?>">Tambah obat</a>
					</div>
				</div>
			</li>

			<li class="nav-item <?php echo active_link(['transaksi', 'transaksi/tambah']) ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
					aria-controls="collapseThree">
					&nbsp;<i class="fas fa-fw fa-user-check"></i>
					<span>Transaksi</span>
				</a>
				<div id="collapseThree" class="collapse <?php echo active_link(['transaksi', 'transaksi/tambah'], 'show') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo active_link('transaksi') ?>" href="<?php echo site_url('transaksi'); ?>">Data transaksi</a>
						<a class="collapse-item <?php echo active_link('transaksi/tambah') ?>" href="<?php echo site_url('transaksi/tambah'); ?>">Tambah transaksi</a>
					</div>
				</div>
			</li>

			<hr class="sidebar-divider d-none d-md-block">

			<?php endif; ?>

		</ul>