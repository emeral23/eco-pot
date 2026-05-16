<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php'; 

if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    
    if(mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Username atau Email sudah terdaftar!');</script>";
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO users (username, password, nama_lengkap, email) 
                                         VALUES ('$username', '$password', '$nama', '$email')");
        if($query) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='login.php';</script>";
        }
    }
}
?>

<section class="auth-container">
    <h1>Daftar Akun Eco-Pot</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="register" class="btn-auth">Daftar</button>
        <p>Udah punya akun? <a href="login.php">Login di sini</a></p>
    </form>
</section>

<?php include '../includes/footer.php'; ?>