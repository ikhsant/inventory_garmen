<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-20 21:04:35
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-20 22:23:54
 */
$title = 'Keluar Masuk Barang';
include "../include/header.php";
?>

<?php
$xcrud->table('stok');
$xcrud->table_name('Keluar Masuk Barang');
$xcrud->relation('barang','barang','id_barang','nama_barang');
$xcrud->validation_required('barang,tanggal');
$xcrud->sum('qty_masuk,qty_keluar');
echo $xcrud->render();
?>


<?php 
include "../include/footer.php";
?>