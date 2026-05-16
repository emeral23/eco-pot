<?php
session_start();
$_SESSION['cart'] = []; // Ini bakal ngosongin keranjang lu yang eror itu
include '../config/database.php';
/** @var mysqli $koneksi */

// Kalau mau reset session karena eror terus, aktifkan baris di bawah ini sekali saja:
// session_destroy(); session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data sesuai kolom di image_2d87f2.png
    $res = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product = '$id'");
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        // Simpan dalam format array agar tidak kena error "offset type string"
        if (!isset($_SESSION['cart'][$id]) || !is_array($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'nama_produk' => $row['nama_produk'],
                'harga' => $row['harga'],
                'jumlah' => 1
            ];
        } else {
            $_SESSION['cart'][$id]['jumlah'] += 1;
        }
        header("Location: cart.php");
        exit();
    }
}
header("Location: index.php");