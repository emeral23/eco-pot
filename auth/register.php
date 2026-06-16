<?php 
session_start();
include '../config/database.php';
/** @var mysqli $koneksi */ // Biar VS Code paham

if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password otomatis

    // Cek ganda biar username atau email gak kembar di database
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    
    if(mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Username atau Email sudah terdaftar, Ral!');</script>";
    } else {
        // Memasukkan role 'customer' secara otomatis saat registrasi
        $query = mysqli_query($koneksi, "INSERT INTO users (username, password, nama_lengkap, email, role) 
                                         VALUES ('$username', '$password', '$nama', '$email', 'customer')");
        if($query) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Gagal registrasi, cek struktur tabel database lu!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Eco-Pot</title>
    <link rel="stylesheet" href="style-auth.css">
</head>

<body>
    <div class="auth-container">
        <h1>Daftar Akun Eco-Pot</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" name="register" class="btn-auth">Daftar Sekarang</button>
            <p>Udah punya akun? <a href="login.php">Login di sini</a></p>
        </form>
    </div>
</body>

</html>