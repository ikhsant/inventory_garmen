<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-20 21:04:35
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-20 22:17:05
 */
$title = 'Barang';
include "../include/header.php";
?>

<?php
$xcrud->table('barang');
$xcrud->table_name('Data Barang');
$xcrud->relation('style','style','id_style','nama_style');
$xcrud->unset_remove();
$xcrud->validation_required('kode_barang');
echo $xcrud->render();
?>


<?php 
include "../include/footer.php";
?>