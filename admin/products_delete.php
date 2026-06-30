<?php
include '../config/database.php';
/** @var mysqli $koneksi */
$id = $_GET['id'];

// 1. Ambil nama gambar
$res = mysqli_query($koneksi, "SELECT gambar FROM products WHERE id_product = '$id'");
$data = mysqli_fetch_assoc($res);

// 2. Cek dulu apakah gambarnya ada di folder sebelum di-unlink biar gak warning
if (!empty($data['gambar']) && file_exists("../assets/uploads/products/" . $data['gambar'])) {
    unlink("../assets/uploads/products/" . $data['gambar']);
}

// 3. Hapus dulu data transaksi yang mengikat id_product ini di order_details
mysqli_query($koneksi, "DELETE FROM order_details WHERE id_product = '$id'");

// 4. Baru aman deh hapus data produk utamanya
mysqli_query($koneksi, "DELETE FROM products WHERE id_product = '$id'");

header("Location: products_view.php");
exit();
?>