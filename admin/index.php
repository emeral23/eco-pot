<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Biar VS Code paham
include '../includes/header.php'; 

// Proteksi Admin - Memastikan hanya admin yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// ==================== QUERY AMBIL DATA DINAMIS ====================

// 1. Ambil total produk dari database
$query_produk = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM products WHERE status = 'aktif'");
$data_produk = mysqli_fetch_assoc($query_produk);
$total_produk = $data_produk['total'];

// 2. Hitung total blog/posts
$query_posts = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM posts");
$data_posts = mysqli_fetch_assoc($query_posts);
$total_posts = $data_posts['total'];

// 3. Hitung total user/pelanggan
$query_users = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM users");
$data_users = mysqli_fetch_assoc($query_users);
$total_users = $data_users['total'];

// 4. Hitung total pesan masuk
$query_contacts = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM contacts");
$data_contacts = mysqli_fetch_assoc($query_contacts);
$total_contacts = $data_contacts['total'];

// ===================================================================
?>

<div class="dashboard-wrapper with-sidebar">
    <main class="content-area-sidebar">
        <header class="top-header">
            <div class="search-bar">
                <input type="text" placeholder="Search data Eco-Pot...">
            </div>
            <div class="header-user-info">
                <span class="notif-icon">🔔</span>
                <span class="user-name">Halo, <?= $_SESSION['nama_lengkap'] ?? $_SESSION['username']; ?></span>
            </div>
        </header>

        <section class="main-body">

            <div class="stats-grid">
                <!-- Card 1: Total Barang -->
                <div class="card-stat card-barang">
                    <div class="card-info">
                        <h3>Total Barang</h3>
                        <p><?= $total_produk; ?></p>
                    </div>
                    <div class="card-icon">📦</div>
                </div>

                <!-- Card 2: Total Blog -->
                <div class="card-stat card-blog">
                    <div class="card-info">
                        <h3>Total Blog</h3>
                        <p><?= $total_posts; ?></p>
                    </div>
                    <div class="card-icon">📝</div>
                </div>

                <!-- Card 3: Total User -->
                <div class="card-stat card-user">
                    <div class="card-info">
                        <h3>Total User</h3>
                        <p><?= $total_users; ?></p>
                    </div>
                    <div class="card-icon">👥</div>
                </div>

                <!-- Card 4: Total Pesan -->
                <div class="card-stat card-pesan">
                    <div class="card-info">
                        <h3>Total Pesan</h3>
                        <p><?= $total_contacts; ?></p>
                    </div>
                    <div class="card-icon">📩</div>
                </div>
            </div>
            <div class="report-section">
                <div class="report-card">
                    <div class="card-header-flex">
                        <h3>Recent System Activity</h3>
                        <span class="status-badge">System Online</span>
                    </div>
                    <div class="chart-placeholder">
                        <p>Semua sistem berjalan normal di database <strong>BriketKuy</strong>.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<style>
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 35px;
    width: 100%;
    box-sizing: border-box;
}

.card-stat {
    background-color: #ffffff;
    border-radius: 12px;
    padding-top: 24px;
    padding-bottom: 24px;
    padding-left: 24px;
    padding-right: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
}

.card-info h3 {
    font-size: 14px;
    color: #64748b;
    margin: 0;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-info p {
    font-size: 32px;
    font-weight: 700;
    color: #1e293b;
    margin-top: 8px;
    margin-bottom: 0;
}

.card-icon {
    font-size: 36px;
    opacity: 0.8;
}

/* Variasi warna border kiri tipis untuk mempercantik navigasi visual admin */
.card-barang {
    border-left: 4px solid #3b82f6;
}

.card-blog {
    border-left: 4px solid #10b981;
}

.card-user {
    border-left: 4px solid #f59e0b;
}

.card-pesan {
    border-left: 4px solid #ec4899;
}
</style>

<?php include '../includes/footer.php'; ?>