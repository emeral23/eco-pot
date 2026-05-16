<?php
session_start();
include '../config/database.php';
/** @var mysqli $koneksi */

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; // Disarankan pake password_verify kalau di-hash

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        // Simpan data penting ke Session
        $_SESSION['user_id']  = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $data['role']; // Ini yang bikin menu lu nanti bener
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

        // Cek Role buat nentuin halaman tujuan
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
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Login Eco-Pot</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
    /* Sesuai request lu, CSS dipisah ke bawah */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
    }

    .login-container {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .input-login {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .btn-submit-login {
        width: 100%;
        padding: 12px;
        background-color: #2D7A35;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 style="text-align: center; color: #2D7A35;">Masuk Ke Eco-Pot</h2>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') : ?>
        <p style="color: red; text-align: center;">Username atau Password salah, Ral!</p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" class="input-login" placeholder="Username" required>
            <input type="password" name="password" class="input-login" placeholder="Password" required>
            <button type="submit" name="login" class="btn-submit-login">Masuk Sekarang</button>
        </form>
    </div>
</body>

</html>