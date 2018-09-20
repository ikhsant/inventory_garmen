<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-20 21:04:35
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-20 21:55:44
 */
$title = 'Stok';
include "../include/header.php";
?>

<?php
$xcrud->table('stok');
$xcrud->table_name('Laporan Barang');
$xcrud->relation('barang','barang','id_barang','nama_barang');
$xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    $xcrud->unset_view();
    $xcrud->unset_csv();
    $xcrud->unset_limitlist();
    $xcrud->unset_numbers();
    $xcrud->unset_pagination();
    $xcrud->unset_search();
    $xcrud->unset_sortable();
$xcrud->sum('qty_masuk,qty_keluar');
echo $xcrud->render();
?>


<?php 
include "../include/footer.php";
?>