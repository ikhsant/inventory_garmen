<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-20 21:04:35
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-20 21:10:07
 */
$title = 'Style';
include "../include/header.php";
?>

<?php
$xcrud->table('style');
$xcrud->table_name('Data Style');
echo $xcrud->render();
?>


<?php 
include "../include/footer.php";
?>