<?php 
include '../config/database.php';
include '../includes/header.php'; 

// Proteksi Admin - Memastikan hanya admin yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<div class="dashboard-wrapper">
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
                <li class="active"><a href="index.php">🏠 Dashboard</a></li>
                <li><a href="products_view.php">📦 Inventory</a></li>
                <li><a href="blog_manage.php">✍️ Articles</a></li>
                <li><a href="users_manage.php">👥 Customers</a></li>
                <li><a href="orders_manage.php">🛒 Orders</a></li>
                <li><a href="messages.php">📧 Messages</a></li>
                <li class="logout-nav">
                    <a href="../auth/logout.php" onclick="return confirm('Yakin mau keluar, Ral?')">🚪 Sign Out</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="content-area">
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
            <div class="welcome-text">
                <h2>Welcome back, <?= $_SESSION['nama_lengkap'] ?? $_SESSION['username']; ?></h2>
            </div>

            <div class="stats-container">
                <div class="card-modern blue">
                    <div class="card-info">
                        <h3>124</h3>
                        <p>Total Products</p>
                    </div>
                    <div class="card-footer" onclick="location.href='products_view.php'">Show Details</div>
                </div>

                <div class="card-modern orange">
                    <div class="card-info">
                        <h3>45</h3>
                        <p>Active Users</p>
                    </div>
                    <div class="card-footer" onclick="location.href='users_manage.php'">Manage Users</div>
                </div>

                <div class="card-modern green">
                    <div class="card-info">
                        <h3>12</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="card-footer" onclick="location.href='orders_manage.php'">View Shop</div>
                </div>

                <div class="card-modern yellow">
                    <div class="card-info">
                        <h3>8</h3>
                        <p>Feedbacks</p>
                    </div>
                    <div class="card-footer" onclick="location.href='messages.php'">Read Messages</div>
                </div>
            </div>

            <div class="report-section">
                <div class="report-card">
                    <div class="card-header-flex">
                        <h3>Recent System Activity</h3>
                        <span class="status-badge">System Online</span>
                    </div>
                    <div class="chart-placeholder">
                        <p>Semua sistem berjalan normal di database <strong>eco_pot</strong>.</p>
                        <p>Gunakan sidebar di kiri untuk mengelola konten website lu secara penuh.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php include '../includes/footer.php'; ?>