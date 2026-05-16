<?php
session_start();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Kalau belum login, lempar ke login.php dengan pesan error
    header("Location: login.php?pesan=wajib_login");
    exit();
}

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "eco_pot");

$id_product = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id_product > 0) {
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id_product = '$id_product'");
    $p = mysqli_fetch_array($query);

    if ($p) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id_product])) {
            $_SESSION['cart'][$id_product]['qty'] += 1;
        } else {
            $_SESSION['cart'][$id_product] = [
                'nama' => $p['nama_produk'],
                'harga' => $p['harga'],
                'gambar' => $p['gambar'],
                'qty' => 1
            ];
        }
        
        header("Location: detail_produk.php?id=$id_product&status=success");
    } else {
        header("Location: index.php");
    }
}
?>