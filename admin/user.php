<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-19 22:11:29
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-20 22:20:07
 */
$title = 'User';
include "../include/header.php";
?>

<?php
$xcrud->table('user');
$xcrud->table_name('Data Pegawai');

$xcrud->change_type('password', 'password', 'sha1', array('maxlength'=>100,'placeholder'=>'Masukan password'));
$xcrud->change_type('foto', 'image');
$xcrud->change_type('akses_level','select','','admin,gudang,cutting,supervisor');
echo $xcrud->render();
?>

<?php 
include "../include/footer.php";
?>