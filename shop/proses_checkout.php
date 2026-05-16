<?php
session_start();
include '../config/database.php';
/** @var mysqli $koneksi */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_penerima']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    // Tangkap data metode pembayaran
    $metode = mysqli_real_escape_string($koneksi, $_POST['metode_pembayaran']); 
    $tgl = date('Y-m-d H:i:s');
    $total_harga = 0;

    foreach ($_SESSION['cart'] as $item) {
        if (is_array($item)) {
            $total_harga += ($item['harga'] ?? 0) * ($item['jumlah'] ?? 0);
        }
    }

    // Masukin ke kolom metode_pembayaran yang baru kita buat tadi
    $sql_order = "INSERT INTO orders (id_user, tanggal_order, total_harga, status_pesanan, alamat_pengiriman, metode_pembayaran) 
                  VALUES (NULL, '$tgl', '$total_harga', 'Pending', '$alamat', '$metode')";

    if (mysqli_query($koneksi, $sql_order)) {
        $id_order = mysqli_insert_id($koneksi);

        foreach ($_SESSION['cart'] as $id_produk => $item) {
            if (is_array($item)) {
                $qty = $item['jumlah'] ?? 0;
                $harga = $item['harga'] ?? 0;
                $sub = $harga * $qty;
                
                mysqli_query($koneksi, "INSERT INTO order_details (id_order, id_product, jumlah, subtotal) 
                                        VALUES ('$id_order', '$id_produk', '$qty', '$sub')");
            }
        }

        unset($_SESSION['cart']);
        echo "<script>alert('Pesanan lu sukses pake $metode, Ral!'); window.location='../index.php';</script>";
    } else {
        echo "Aduh gagal: " . mysqli_error($koneksi);
    }
}