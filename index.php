<?php
/** @var mysqli $koneksi */
session_start();
include 'config/database.php';
include 'includes/header.php';
?>

<!-- KONTEN UTAMA USER - HERO SECTION ESTETIK -->
<section class="hero-aesthetic">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Menumbuhkan Kehidupan, <br>Menjaga Masa Depan</h1>
        <p class="hero-subtitle">Setiap pot ramah lingkungan membawa satu langkah lebih dekat menuju bumi yang lebih
            hijau dan selaras dengan alam.</p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<style>
/* Base Layout Hero Section Estetik dengan Background Gambar */
.hero-aesthetic {
    position: relative;
    width: 100%;
    min-height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url('assets/img/eco-pot.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow: hidden;
    padding: 40px 20px;
    box-sizing: border-box;
}

/* Lapisan Overlay Halus Agar Teks Kontras & Mudah Dibaca */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0.4) 100%);
    z-index: 1;
}

/* Pembungkus Konten Teks */
.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 800px;
    animation: fadeInUp 1s ease-out;
}

/* Kalimat Judul Aesthetic (Typography Tebal & Hijau Eco-Pot) */
.hero-title {
    font-size: 48px;
    font-weight: 800;
    color: #1b5e20;
    line-height: 1.2;
    margin: 0;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
}

/* Kalimat Sub-Judul Penjelas */
.hero-subtitle {
    font-size: 18px;
    font-weight: 500;
    color: #475569;
    line-height: 1.6;
    margin: 0;
    margin-bottom: 35px;
}

/* Area Tombol Pilihan */
.hero-actions {
    display: flex;
    justify-content: center;
    gap: 16px;
}

/* Tombol Utama (Solid Hijau) */
.btn-hero-primary {
    display: inline-block;
    padding: 14px 28px;
    background-color: #2e7d32;
    color: #ffffff;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.2);
    transition: all 0.3s ease;
}

.btn-hero-primary:hover {
    background-color: #1b5e20;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(46, 125, 50, 0.3);
}

/* Tombol Kedua (Outline Transparan) */
.btn-hero-secondary {
    display: inline-block;
    padding: 14px 28px;
    background-color: transparent;
    color: #2e7d32;
    border: 2px solid #2e7d32;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.btn-hero-secondary:hover {
    background-color: #2e7d32;
    color: #ffffff;
    transform: translateY(-2px);
}

/* Animasi Muncul Lembut Pas Halaman Dimuat */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>