<?php
// Pastiin session udah jalan buat ngecek login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$base_url = "http://localhost/project-eco/";

// Cek apakah user adalah admin
$is_admin = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $is_admin ? 'Admin Panel | BriketKuy' : 'BriketKuy | Premium Coconut Charcoal Briket'; ?>
    </title>

    <!-- Google Fonts untuk tampilan font modern -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/navbar-footer.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/components.css">
    <?php if ($is_admin) : ?>
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/admin.css">
    <?php endif; ?>
</head>

<body>
    <header class="main-header">
        <nav class="navbar-container">
            <!-- Area Logo -->
            <div class="logo">
                <a href="<?= $base_url; ?>index.php">
                    Briket<span>Kuy</span>
                    <?= $is_admin ? '<span class="badge-admin">ADMIN</span>' : ''; ?>
                </a>
            </div>

            <!-- Menu Navigasi Utama -->
            <ul class="nav-links">
                <?php if ($is_admin) : ?>
                <li><a href="<?= $base_url; ?>admin/index.php" class="nav-item">Dashboard</a></li>
                <li><a href="<?= $base_url; ?>admin/products_view.php" class="nav-item">Barang</a></li>
                <li><a href="<?= $base_url; ?>admin/blog_manage.php" class="nav-item">Blog</a></li>
                <li><a href="<?= $base_url; ?>admin/users_manage.php" class="nav-item">User</a></li>
                <li><a href="<?= $base_url; ?>admin/messages_view.php" class="nav-item">Lihat Pesan</a></li>

                <?php else : ?>
                <li><a href="<?= $base_url; ?>index.php" class="nav-item">Home</a></li>
                <li><a href="<?= $base_url; ?>shop/index.php" class="nav-item">Barang</a></li>
                <li><a href="<?= $base_url; ?>blog/index.php" class="nav-item">Informasi</a></li>
                <li><a href="<?= $base_url; ?>contact.php" class="nav-item">WhatsApp</a></li>
                <li><a href="<?= $base_url; ?>pesan.php" class="nav-item">Pesan</a></li>

                <?php endif; ?>
            </ul>

            <!-- Menu Autentikasi User / Admin -->
            <div class="user-menu">
                <?php if (isset($_SESSION['user_id'])) : ?>
                <span class="user-name">Halo, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong></span>
                <a href="<?= $base_url; ?>auth/logout.php" class="btn-auth btn-logout">Logout</a>
                <?php else : ?>
                <a href="<?= $base_url; ?>auth/login.php" class="btn-auth btn-login">Login Admin</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main></main>