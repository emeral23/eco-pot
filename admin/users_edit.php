<?php 
ob_start();
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php'; 

// Proteksi Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$get_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id'");
$data = mysqli_fetch_assoc($get_user);

if (isset($_POST['update'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $role = $_POST['role'];

    $query = "UPDATE users SET 
              username='$username', 
              nama_lengkap='$nama', 
              email='$email', 
              role='$role' 
              WHERE id_user='$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: users_manage.php?status=updated");
    }
}
?>

<div class="dashboard-wrapper">
    <main class="content-main">
        <section class="form-container-modern">
            <div class="form-header">
                <a href="users_manage.php" class="btn-back">⬅️ Kembali</a>
                <h2>Edit Profil: <?= $data['username']; ?></h2>
            </div>

            <form action="" method="POST" class="modern-form">
                <div class="form-grid single-col">
                    <div class="form-inputs">
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= $data['username']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= $data['email']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label>Role / Akses</label>
                            <select name="role" required>
                                <option value="ADMIN" <?= $data['role'] == 'ADMIN' ? 'selected' : ''; ?>>ADMIN</option>
                                <option value="CUSTOMER" <?= $data['role'] == 'CUSTOMER' ? 'selected' : ''; ?>>CUSTOMER
                                </option>
                            </select>
                        </div>

                        <button type="submit" name="update" class="btn-submit-primary">💾 Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>

<?php include '../includes/footer.php'; ?>