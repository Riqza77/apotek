<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak</title>
</head>
<body>
	<div style="width: 500px; margin: auto;">
		<br>
		<center>
			<?php echo "Kimia Farma" ?><br>
			<?php echo "Wonokerto, Pekalongan" ?><br><br>
			<table width="100%">
				<tr>
					<td><?php echo "Tanggal Transaksi" ?></td>
					<td align="right"><?php echo $tgl ?></td>
				</tr>
			</table>
			<hr>
			<table width="100%">
				<tr>
					<td width="50%"></td>
					<td width="3%"></td>
					<td width="10%" align="right"></td>
					<td align="right" width="100%"><?php echo $admin ?></td>
				</tr>
				<?php foreach ($obat as $key): ?>
					<tr>
						<td><?php echo $key->nama_obat ?></td>
						<td></td>
						<td align="right"><?php echo $key->jumlah ?></td>
						<td align="right"><?php echo $key->harga ?></td>
					</tr>
				<?php endforeach ?>
			</table>
			<hr>
			<table width="100%">
				<tr>
					<td width="76%" align="right">
						Harga Jual
					</td>
					<td width="23%" align="right">
						<?php echo $total_bayar ?>
					</td>
				</tr>
			</table>
			<hr>
			<table width="100%">
				<tr>
					<td width="76%" align="right">
						Total
					</td>
					<td width="23%" align="right">
						<?php echo $total_bayar ?>
					</td>
				</tr>
				<tr>
					<td width="76%" align="right">
						Bayar
					</td>
					<td width="23%" align="right">
						<?php echo $uang_bayar ?>
					</td>
				</tr>
				<tr>
					<td width="76%" align="right">
						Kembalian
					</td>
					<td width="23%" align="right">
						<?php echo $kembalian ?>
					</td>
				</tr>
			</table>
			<br>
			Terima Kasih <br>
			<?php echo $admin; ?>
		</center>
	</div>
	<script>
		window.print()
	</script>
</body>
</html>