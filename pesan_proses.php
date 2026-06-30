<?php
include 'config/database.php';
/** @var mysqli $koneksi */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data dan amankan dari SQL Injection
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $subjek = mysqli_real_escape_string($koneksi, $_POST['subjek']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    
    // Status baca default-nya 'belum_dibaca' (bisa lu sesuaikan di enum database lu)
    $status_baca = 'belum_dibaca'; 

    // Query insert disesuaikan dengan kolom tabel contacts lu
    $query = "INSERT INTO contacts (nama, email, subjek, pesan, status_baca, created_at) 
              VALUES ('$nama', '$email', '$subjek', '$pesan', '$status_baca', NOW())";

    if (mysqli_query($koneksi, $query)) {
        // Kalau sukses, balikkan ke halaman pesan dan kasih tanda sukses
        header("Location: pesan.php?status=sukses");
        exit();
    } else {
        echo "Gagal menyimpan pesan: " . mysqli_error($koneksi);
    }
} else {
    // Kalau coba akses file ini langsung tanpa lewat form, tendang balik
    header("Location: pesan.php");
    exit();
}
?>