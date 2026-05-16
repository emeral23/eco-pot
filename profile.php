<?php 
include 'includes/header.php';
include 'includes/auth_check.php'; // Pastiin user udah login
include 'config/database.php';

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
$user = mysqli_fetch_assoc($query);
?>

<section class="profile-container">
    <h1>Profil Saya</h1>
    <div class="profile-card">
        <p><strong>Username:</strong> <?= $user['username']; ?></p>
        <p><strong>Nama Lengkap:</strong> <?= $user['nama_lengkap']; ?></p>
        <p><strong>Email:</strong> <?= $user['email']; ?></p>
        <p><strong>Alamat:</strong> <?= $user['alamat']; ?></p>
        <p><strong>No. Telp:</strong> <?= $user['no_telp']; ?></p>
        <a href="edit_profile.php" class="btn-edit">Edit Profil</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>