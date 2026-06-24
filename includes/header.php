<?php
// Pastiin session udah jalan buat ngecek login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$base_url = "http://localhost/project-eco/";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? 'Admin Panel' : 'Eco-Pot | Ramah Lingkungan'; ?>
    </title>
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/navbar-footer.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/components.css">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/admin.css">
    <?php endif; ?>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <a href="<?= $base_url; ?>index.php" style="color: #ffffff; text-decoration: none;">ECO-POT
                    <?= isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? '<span class="badge-admin">ADMIN</span>' : ''; ?>
                </a>
            </div>

            <ul class="nav-links">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                <li><a href="<?= $base_url; ?>admin/index.php">Dashboard</a></li>
                <li><a href="<?= $base_url; ?>admin/products_view.php">Produk</a></li>
                <li><a href="<?= $base_url; ?>admin/blog_manage.php">Blog</a></li>
                <li><a href="<?= $base_url; ?>admin/users_manage.php">User</a></li>
                <?php else : ?>
                <li><a href="<?= $base_url; ?>index.php">Home</a></li>
                <li><a href="<?= $base_url; ?>shop/index.php">Shop</a></li>
                <li><a href="<?= $base_url; ?>blog/index.php">Tutorial</a></li>
                <li><a href="<?= $base_url; ?>about.php">About</a></li>
                <li><a href="<?= $base_url; ?>contact.php">Contact</a></li>
                <?php endif; ?>
            </ul>

            <div class="user-menu">
                <?php if (isset($_SESSION['user_id'])) : ?>
                <span class="user-name">Halo, <?= $_SESSION['username']; ?></span>
                <a href="<?= $base_url; ?>auth/logout.php" class="btn-logout">Logout</a>
                <?php else : ?>
                <a href="<?= $base_url; ?>auth/login.php" class="btn-login">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main></main>