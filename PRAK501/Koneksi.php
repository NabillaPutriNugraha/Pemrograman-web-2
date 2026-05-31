<?php
$host     = "sql105.infinityfree.com";
$username = "if0_41984853";
$password = "Nabilla1223"; 
$database = "if0_41984853_perpus";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>