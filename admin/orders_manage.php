<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Biar VS Code paham
include '../includes/header.php'; 

// Proteksi Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// Ambil data pesanan dari database sesuai nama tabel dan urutan terbaru
$query_orders = mysqli_query($koneksi, "SELECT * FROM `orders` ORDER BY id_order DESC");
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
            <div class="search-bar">
                <input type="text" placeholder="Search orders...">
            </div>
            <div class="header-user-info">
                <span class="notif-icon">🔔</span>
                <span class="user-name">Halo, <?= $_SESSION['nama_lengkap'] ?? $_SESSION['username']; ?></span>
            </div>
        </header>

        <section class="main-body">
            <div class="page-banner-green">
                <div class="banner-text">
                    <h2>Daftar Pesanan Masuk</h2>
                    <p>Kelola status pembayaran dan pengiriman barang Eco-Pot di sini.</p>
                </div>
            </div>

            <div class="table-container-modern">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query_orders)) : ?>
                        <tr>
                            <td class="order-id-text">#<?= $row['id_order']; ?></td>
                            <td class="price-text">Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                            <td>
                                <span class="status-badge-order <?= strtolower($row['status_pesanan']); ?>">
                                    <?= ucfirst($row['status_pesanan']); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="update_status.php?id=<?= $row['id_order']; ?>" class="btn-action-edit">
                                    ⚙️ Update Status
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<?php include '../includes/footer.php'; ?>