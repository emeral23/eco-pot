<?php 
include 'config/database.php';
include 'includes/header.php';

// Ambil data about dari database (opsional, atau bisa tulis langsung di HTML)
// Misal kita tulis langsung biar cepet:
?>

<section class="about-container">
    <div class="about-hero">
        <h1>Tentang Eco-Pot</h1>
        <p>Solusi Hijau untuk Bumi yang Lebih Baik</p>
    </div>

    <div class="about-content">
        <div class="about-section">
            <h2>Visi Kami</h2>
            <p>Menjadi pelopor produk berkebun ramah lingkungan yang mampu menggantikan penggunaan plastik sekali pakai
                di seluruh Indonesia.</p>
        </div>

        <div class="about-section">
            <h2>Misi Kami</h2>
            <ul>
                <li>Memproduksi pot tanaman berbahan limbah organik yang berkualitas tinggi.</li>
                <li>Edukasi masyarakat tentang pentingnya berkebun tanpa sampah plastik.</li>
                <li>Memberdayakan sumber daya lokal dalam proses produksi.</li>
            </ul>
        </div>

        <div class="about-section">
            <h2>Kenapa Memilih Eco-Pot?</h2>
            <p>Produk kami terbuat dari bahan alami yang dapat terurai (biodegradable). Jadi, lu nggak cuma nanem pohon,
                tapi juga nggak nyampah plastik pas mindahin taneman lu ke tanah!</p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>