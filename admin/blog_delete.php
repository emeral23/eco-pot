<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham

$id = $_GET['id'];

// Ambil nama gambar buat dihapus dari folder assets biar gak menuh-menuhin hosting
$get_img = mysqli_query($koneksi, "SELECT gambar FROM posts WHERE id_post = '$id'");
$data = mysqli_fetch_assoc($get_img);
if ($data['gambar'] != '') {
    unlink("../assets/img/" . $data['gambar']);
}

$query = mysqli_query($koneksi, "DELETE FROM posts WHERE id_post = '$id'");

if ($query) {
    header("Location: blog_manage.php?status=deleted");
}
?>