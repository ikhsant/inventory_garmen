<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-19 22:11:29
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-20 21:06:42
 */
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventory_garmen";

// Membuat Koneksi
$conn = mysqli_connect($servername,$username,$password,$database);

// mengecek Koneksi

if(!$conn){
	die("Gagal Koneksi ke database". mysqli_connect_error());
}

?>