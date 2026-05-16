<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
session_start();

// 1. Ambil ID dari URL dengan metode GET
// Pastiin di users_manage.php linknya: users_delete.php?id=...
$id = isset($_GET['id']) ? $_GET['id'] : '';

// 2. Cek apakah ID kosong
if (empty($id)) {
    echo "<script>
            alert('ID User tidak ditemukan, Ral!');
            window.location.href='users_manage.php';
          </script>";
    exit();
}

// 3. Proteksi: Jangan biarkan admin hapus dirinya sendiri
if ($id == $_SESSION['id_user']) {
    echo "<script>
            alert('Gak bisa hapus akun sendiri! Nanti lu gak bisa login lagi, Ral.');
            window.location.href='users_manage.php';
          </script>";
    exit();
}

// 4. Eksekusi perintah hapus ke database
// Pastiin nama tabel 'users' dan kolom 'id_user' sudah sesuai di database lu
$query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user = '$id'");

if ($query) {
    // 5. Jika berhasil, balikkan ke halaman manage dengan status deleted
    header("Location: users_manage.php?status=deleted");
    exit();
} else {
    // 6. Jika gagal karena error SQL, tampilkan pesannya
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>