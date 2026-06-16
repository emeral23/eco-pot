<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Biar VS Code paham
include '../includes/header.php'; 

// Proteksi Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// 1. Ambil ID Order dari URL
if (!isset($_GET['id'])) {
    header("Location: orders_manage.php");
    exit();
}
$id_order = $_GET['id'];

// 2. Ambil data pesanan lama berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM `orders` WHERE `id_order` = '$id_order'");
$order = mysqli_fetch_assoc($query);

if (!$order) {
    echo "<script>alert('Data pesanan tidak ditemukan!'); window.location='orders_manage.php';</script>";
    exit();
}

// 3. Proses Update Status ketika tombol Simpan ditekan
if (isset($_POST['submit_update'])) {
    $status_baru = $_POST['status_pesanan'];
    
    $update_query = mysqli_query($koneksi, "UPDATE `orders` SET `status_pesanan` = '$status_baru' WHERE `id_order` = '$id_order'");
    
    if ($update_query) {
        echo "<script>alert('Status pesanan berhasil diperbarui!'); window.location='orders_manage.php';</script>";
        exit();
    } else {
        echo "<script>alert('Gagal memperbarui status!');</script>";
    }
}
?>

<div class="dashboard-wrapper with-sidebar">
    <aside class="admin-sidebar">
        <div class="profile-section">
            <div class="avatar">
                <img src="../assets/img/admin-avatar.png" alt="Admin Profile">
            </div>
            <h4><?= $_SESSION['nama_lengkap'] ?? $_SESSION['username']; ?></h4>
            <p>Administrator</p>
        </div>
        <nav class="side-nav">
            <ul>
                <li><a href="index.php">🏠 Dashboard</a></li>
                <li><a href="products_view.php">📦 Inventory</a></li>
                <li><a href="blog_manage.php">✍️ Articles</a></li>
                <li><a href="users_manage.php">👥 Customers</a></li>
                <li class="active"><a href="orders_manage.php">🛒 Orders</a></li>
                <li class="logout-nav">
                    <a href="../auth/logout.php" onclick="return confirm('Yakin mau keluar?')">🚪 Sign Out</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="content-area-sidebar">
        <header class="top-header">
            <div class="header-user-info" style="margin-left: auto;">
                <span class="user-name">Halo, <?= $_SESSION['nama_lengkap'] ?? $_SESSION['username']; ?></span>
            </div>
        </header>

        <section class="main-body">
            <div class="page-banner-green">
                <div class="banner-text">
                    <h2>Update Status Pesanan #<?= $order['id_order']; ?></h2>
                    <p>Ubah status pembayaran atau pengiriman untuk pesanan ini secara realtime.</p>
                </div>
            </div>

            <div class="form-container-modern">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Total Harga Pesanan</label>
                        <input type="text" value="Rp <?= number_format($order['total_harga'], 0, ',', '.'); ?>"
                            disabled>
                    </div>

                    <div class="form-group">
                        <label>Alamat Pengiriman</label>
                        <textarea disabled><?= $order['alamat_pengiriman']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status_pesanan">Pilih Status Pesanan Baru</label>
                        <select name="status_pesanan" id="status_pesanan" class="select-modern">
                            <option value="pending" <?= ($order['status_pesanan'] == 'pending') ? 'selected' : ''; ?>>⏳
                                Pending</option>
                            <option value="selesai" <?= ($order['status_pesanan'] == 'selesai') ? 'selected' : ''; ?>>✅
                                Selesai</option>
                            <option value="batal" <?= ($order['status_pesanan'] == 'batal') ? 'selected' : ''; ?>>❌
                                Batal</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <a href="orders_manage.php" class="btn-cancel">Kembali</a>
                        <button type="submit" name="submit_update" class="btn-submit-green">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>

<?php include '../includes/footer.php'; ?>