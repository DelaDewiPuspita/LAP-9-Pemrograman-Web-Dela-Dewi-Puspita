<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "database_siswa";
$koneksi    = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>