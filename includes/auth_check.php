<?php
// Cek apakah session sudah dimulai atau belum
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika tidak ada session user_id, tendang ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php?pesan=wajib_login");
    exit();
}
?>