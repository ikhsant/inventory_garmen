<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-20 21:04:35
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-10-09 22:01:25
 */
$title = 'Keluar Masuk Barang';
include "../include/header.php";
$b1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '1' "));
$b2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '2' "));
$b3 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '3' "));
$b4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '4' "));
?>

<h2>Total Per Barang</h2>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<table class="table table-bordered table-striped">
			<tr>
				<th>Kode</th>
				 <th>Barang</th>
				 <th>Jumlah</th>
			</tr>
			<tr>
				<td>001</td>
				<td>sae-a</td>
				<td><?php echo $b1['sisa_barang'] ?></td>
			</tr>
			<tr>
				<td>002</td>
				<td>sae-u</td>
				<td><?php echo $b2['sisa_barang'] ?></td>
			</tr>
			<tr>
				<td>003</td>
				<td>Jersey panny</td>
				<td><?php echo $b3['sisa_barang'] ?></td>
			</tr>
			<tr>
				<td>004</td>
				<td>awl</td>
				<td><?php echo $b4['sisa_barang'] ?></td>
			</tr>
		</table>
	</div>
</div>

<?php
$xcrud->table('stok');
$xcrud->table_name('List Keluar Masuk Barang');
$xcrud->relation('barang','barang','id_barang','nama_barang');
$xcrud->validation_required('barang,tanggal');
$xcrud->sum('qty_masuk,qty_keluar');
echo $xcrud->render();
?>


<?php 
include "../include/footer.php";
?>