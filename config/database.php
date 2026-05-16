<?php
// config/database.php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "eco_pot"; // Nama database yang lu buat tadi

// Proses koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set karakter set ke utf8 (biar simbol atau karakter unik aman)
mysqli_set_charset($koneksi, "utf8");

?>