<?php
session_start();
include '../config/database.php';
/** @var mysqli $koneksi */ // Biar VS Code paham

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Ambil data user berdasarkan username
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        // Verifikasi password inputan dengan password enkripsi di database
        if (password_verify($password, $data['password'])) {
            
            // Simpan identitas user ke Session browser
            $_SESSION['user_id']      = $data['id_user'];
            $_SESSION['username']     = $data['username'];
            $_SESSION['role']         = $data['role']; 
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

            // Cek tingkatan Hak Akses (Role) untuk menentukan lemparan halaman
            if ($data['role'] == 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            header("Location: login.php?pesan=gagal");
            exit();
        }
    } else {
        header("Location: login.php?pesan=gagal");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - BriketKuy</title>
    <link rel="stylesheet" href="style-auth.css">
</head>

<body>
    <div class="auth-container">
        <h1>Masuk Ke BriketKuy</h1>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') : ?>
        <p style="color: red; text-align: center; margin-bottom: 15px;">Username atau Password salah, Bos</p>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" name="login" class="btn-auth">Masuk Sekarang</button>
        </form>
    </div>
</body>

</html>