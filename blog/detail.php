<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php'; 

// Ambil slug dari URL dan amankan dari SQL Injection ringan
$slug = mysqli_real_escape_string($koneksi, $_GET['slug'] ?? '');
$query = mysqli_query($koneksi, "SELECT * FROM posts WHERE slug = '$slug'");
$post = mysqli_fetch_assoc($query);

if(!$post) {
    echo "<script>alert('Konten tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>

<!-- Jarak pembatas agar konten tidak tertutup oleh navbar absolute -->
<div class="navbar-spacing"></div>

<section class="blog-detail-container">
    <!-- Breadcrumb Navigasi -->
    <div class="breadcrumb">
        <a href="index.php">Blog</a> &raquo; <span><?= ucfirst(htmlspecialchars($post['tipe'])); ?></span>
    </div>

    <!-- Header Judul Artikel - Bersih Tanpa Box Hijau Solid -->
    <header class="article-header-clean">
        <span class="post-badge"><?= ucfirst(htmlspecialchars($post['tipe'])); ?></span>
        <h1><?= htmlspecialchars($post['judul']); ?></h1>
        <div class="post-meta">
            <span class="meta-item">📅 <?= date('d M Y', strtotime($post['created_at'])); ?></span>
            <span class="meta-divider">|</span>
            <span class="meta-item">✍️ Administrator</span>
        </div>
    </header>

    <!-- Gambar Utama Artikel -->
    <div class="post-image-box">
        <img src="../assets/img/<?= $post['gambar']; ?>" alt="<?= htmlspecialchars($post['judul']); ?>">
    </div>

    <!-- Isi Konten Artikel -->
    <div class="post-content">
        <?= nl2br(htmlspecialchars($post['konten'])); ?>
    </div>

    <!-- Tombol Navigasi Bawah -->
    <div class="post-footer">
        <a href="index.php" class="btn-back">
            <span class="arrow">&larr;</span> Kembali ke Blog
        </a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

<style>
/* ==========================================================================
   STYLE DETAIL BLOG MODERN (Properti terpisah ke bawah secara konsisten)
   ========================================================================== */

/* Jarak aman supaya atasnya gak ketutup navbar absolute */
.navbar-spacing {
    height: 100px;
}

/* Wadah Utama Detail */
.blog-detail-container {
    max-width: 850px;
    margin: 0 auto;
    padding: 20px 20px 60px 20px;
    box-sizing: border-box;
}

/* Breadcrumb Navigasi */
.breadcrumb {
    font-size: 14px;
    color: #64748b;
    margin-bottom: 25px;
}

.breadcrumb a {
    color: #2e7d32;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.breadcrumb a:hover {
    color: #1b5e20;
}

.breadcrumb span {
    color: #94a3b8;
}

/* Mengganti Class Header Lama Biar Gak Tabrakan atau Berwarna Hijau Solid */
.article-header-clean {
    background: none;
    background-color: transparent;
    padding: 0;
    margin-bottom: 35px;
    box-shadow: none;
    border: none;
}

.post-badge {
    display: inline-block;
    background-color: #e8f5e9;
    color: #2e7d32;
    padding: 6px 16px;
    font-size: 12px;
    font-weight: 700;
    border-radius: 20px;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.article-header-clean h1 {
    font-size: 36px;
    color: #1e293b;
    line-height: 1.3;
    margin: 0;
    margin-bottom: 15px;
    font-weight: 700;
}

/* Meta Data Info - Teks Dibuat Kontras dan Terbaca */
.post-meta {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #475569;
}

.meta-item {
    display: inline-flex;
    align-items: center;
}

.meta-divider {
    margin: 0 12px;
    color: #cbd5e1;
}

/* Pembungkus Gambar Utama */
.post-image-box {
    width: 100%;
    max-height: 480px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    margin-bottom: 40px;
}

.post-image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Area Isi Artikel */
.post-content {
    font-size: 17px;
    color: #334155;
    line-height: 1.8;
    letter-spacing: 0.2px;
}

/* Bagian Footer & Tombol Kembali */
.post-footer {
    margin-top: 50px;
    padding-top: 25px;
    border-top: 1px solid #e2e8f0;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    background-color: #f1f5f9;
    color: #475569;
    text-decoration: none;
    padding: 12px 24px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background-color: #2e7d32;
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(46, 125, 50, 0.2);
}

.btn-back .arrow {
    margin-right: 8px;
    transition: transform 0.3s ease;
}

.btn-back:hover .arrow {
    transform: translateX(-4px);
}
</style>