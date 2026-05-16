<?php
include '../config/database.php';
/** @var mysqli $koneksi */
$id = $_GET['id'];

// Ambil nama gambar biar bisa dihapus dari folder uploads (opsional tapi bagus)
$res = mysqli_query($koneksi, "SELECT gambar FROM products WHERE id_product = '$id'");
$data = mysqli_fetch_assoc($res);
unlink("../assets/uploads/products/" . $data['gambar']);

mysqli_query($koneksi, "DELETE FROM products WHERE id_product = '$id'");
header("Location: products_view.php");
?>