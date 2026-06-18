<?php 
// Start session di baris paling atas
session_start();

include '../config/database.php';
/** @var mysqli $koneksi */ 
include '../includes/header.php'; 

// Ambil data artikel dari database Eco-Pot
$query = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY id_post DESC");
?>

<div class="navbar-spacing"></div>

<section class="blog-section">

    <div class="blog-grid-container">
        <?php if (mysqli_num_rows($query) > 0) : ?>
        <?php while ($post = mysqli_fetch_assoc($query)) : ?>
        <div class="blog-card">
            <div class="card-image-wrapper">
                <span class="card-badge"><?= ucfirst(htmlspecialchars($post['tipe'])); ?></span>
                <img src="../assets/img/<?= htmlspecialchars($post['gambar']); ?>"
                    alt="<?= htmlspecialchars($post['judul']); ?>">
            </div>

            <div class="card-body-content">
                <span class="card-date">📅 <?= date('d M Y', strtotime($post['created_at'])); ?></span>
                <h3><?= htmlspecialchars($post['judul']); ?></h3>
                <p>
                    <?php 
                            // Memotong isi konten teks agar rapi di dalam card
                            $konten_bersih = strip_tags($post['konten']);
                            echo htmlspecialchars(substr($konten_bersih, 0, 120)) . (strlen($konten_bersih) > 120 ? '...' : '');
                            ?>
                </p>
            </div>

            <div class="card-footer-action">
                <a href="detail.php?slug=<?= $post['slug']; ?>" class="btn-detail-blog">Detail</a>
            </div>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <div class="blog-empty">
            <p>Belum ada artikel nih, Ral.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

<style>
/* ==========================================================================
   STYLE BLOG GRID CARD (Properti dibuat terpisah ke bawah secara konsisten)
   ========================================================================== */

/* Jarak aman di bawah navbar transparan */
.navbar-spacing {
    height: 120px;
}

/* Wadah Utama Section */
.blog-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px 80px 20px;
    box-sizing: border-box;
}

/* Judul Halaman Atas */
.blog-header-section {
    text-align: center;
    margin-bottom: 50px;
}

.blog-header-section h1 {
    font-size: 32px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 10px;
    font-weight: 700;
}

.blog-header-section p {
    font-size: 16px;
    color: #64748b;
    margin: 0;
}

/* Container Grid Utama - Diubah ke 3 kolom agar ukuran card lebih besar */
.blog-grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    width: 100%;
}

/* Komponen Setiap Card Blog */
.blog-card {
    background-color: #ffffff;
    border-radius: 14px;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    border: 1px solid #f1f5f9;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
}

/* Pembungkus Gambar Card - Tinggi dinaikkan sedikit agar proporsional */
.card-image-wrapper {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background-color: #f8fafc;
}

.card-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Badge Tipe Blog di Atas Gambar */
.card-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background-color: #2e7d32;
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    padding: 5px 14px;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
}

/* Isi Teks Card */
.card-body-content {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.card-date {
    font-size: 13px;
    color: #94a3b8;
    margin-bottom: 10px;
    font-weight: 500;
}

.card-body-content h3 {
    font-size: 20px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 12px;
    font-weight: 700;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-body-content p {
    font-size: 14.5px;
    color: #64748b;
    margin: 0;
    line-height: 1.6;
}

/* Bagian Tombol di Bawah Card */
.card-footer-action {
    padding: 0 24px 24px 24px;
    background-color: #ffffff;
}

.btn-detail-blog {
    display: block;
    width: 100%;
    text-align: center;
    background-color: #ffffff;
    color: #2e7d32;
    border: 1px solid #2e7d32;
    padding: 11px 0;
    font-size: 14px;
    font-weight: 600;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.btn-detail-blog:hover {
    background-color: #2e7d32;
    color: #ffffff;
}

/* Kondisi Artikel Kosong */
.blog-empty {
    grid-column: span 3;
    text-align: center;
    padding: 50px 0;
    color: #94a3b8;
    font-size: 16px;
}

/* Responsive Breakpoints */
@media (max-width: 992px) {
    .blog-grid-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .blog-empty {
        grid-column: span 2;
    }
}

@media (max-width: 576px) {
    .blog-grid-container {
        grid-template-columns: 100%;
    }

    .blog-empty {
        grid-column: span 1;
    }

    .card-image-wrapper {
        height: 200px;
    }
}
</style>