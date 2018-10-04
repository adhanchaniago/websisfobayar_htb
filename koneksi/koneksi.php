<?php
$hostname	= "localhost";
$username	= "root";
$database	= "db_mtsmanbaul";
mysql_connect($hostname,$username) or die('Koneksi Gagal');
mysql_select_db($database) or die('Database tidak ditemukan');
?>