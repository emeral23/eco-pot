<?php 
// Start session di paling atas jika navbar lu membutuhkan data user login
session_start();

include 'includes/header.php';
/** @var mysqli $koneksi */
include 'config/database.php';

$query_populer = "SELECT * FROM products WHERE gambar IN ('arang kayu.jpeg', 'briket silinder.jpeg', 'briket kotak.jpeg') AND status = 'aktif'";
$result_populer = mysqli_query($koneksi, $query_populer);
?>

<section class="hero-banner-section">
    <div class="hero-overlay-content">
        <h1>Bara Maksimal <br>Energi Alami Tanpa Batas</h1>
        <p>Briket tempurung kelapa premium dengan panas tinggi, tahan lama, dan 100% bebas asap untuk kebutuhan memasak,
            usaha, hingga industri.</p>
        <p>Solusi energi bersih dan ramah lingkungan dari olahan limbah kelapa berkualitas.</p>
    </div>
</section>

<!-- Banner Promo Diskon 10% -->
<section class="promo-banner-section">
    <div class="promo-banner-container">
        <div class="promo-content">
            <span class="promo-badge">🔥 Promo Spesial</span>
            <h1>Diskon 10% untuk Pembelian Pertama Lu!</h1>
            <p>Dapatkan briket tempurung kelapa premium dan produk eco-friendly terbaik dengan harga lebih hemat khusus
                hari ini.</p>

            <div class="promo-actions">
                <a href="contact.php" class="btn-promo-primary">Hubungi Penjual</a>
                <div class="promo-code-box">
                    <span class="code-label">Gunakan Kode:</span>
                    <strong class="code-text">ECO10</strong>
                </div>
            </div>
        </div>

        <div class="promo-illustration">
            <!-- Lu bisa ganti emoji ini pakai gambar briket/pot andalan lu kalau udah ada filenya -->
            <div class="promo-emoji-wrapper">🌿</div>
        </div>
    </div>
</section>

<!-- Section Produk Terpopuler (Hardcoded) -->
<section class="featured-products-section">
    <div class="featured-container">
        <div class="featured-header">
            <span class="featured-subtitle">Pilihan Terbaik</span>
            <h2>🔥 Produk Terpopuler Hari Ini</h2>
            <p>Jangan sampai kehabisan! Ini dia produk briket dan media tanam eco-friendly yang paling banyak dicari
                pembeli.</p>
        </div>

        <div class="featured-grid">

            <!-- Produk 1: Arang Kayu -->
            <div class="featured-card">
                <div class="card-image-wrapper">
                    <img src="assets/img/arang kayu.jpeg" alt="Arang Kayu">
                    <span class="card-badge-populer">Best Seller</span>
                </div>
                <div class="card-details">
                    <h3>Arang Kayu</h3>
                    <p class="card-description">Arang kayu berkualitas tinggi, menghasilkan panas yang stabil dan tahan
                        lama untuk kebutuhan membakar lu.</p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 10.000</span>
                        <span class="card-stock">Stok: 60</span>
                    </div>
                    <a href="detail_produk.php?id=15" class="btn-view-detail">Lihat Produk</a>
                </div>
            </div>

            <!-- Produk 2: Briket Silinder -->
            <div class="featured-card">
                <div class="card-image-wrapper">
                    <img src="assets/img/briket silinder.jpeg" alt="Briket Silinder">
                    <span class="card-badge-populer">Best Seller</span>
                </div>
                <div class="card-details">
                    <h3>Briket Silinder</h3>
                    <p class="card-description">Briket berbentuk silinder dengan lubang di tengah, sirkulasi udara
                        maksimal membuat bara api awet seharian.</p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 20.000</span>
                        <span class="card-stock">Stok: 50</span>
                    </div>
                    <a href="detail_produk.php?id=13" class="btn-view-detail">Lihat Produk</a>
                </div>
            </div>

            <!-- Produk 3: Briket Kotak -->
            <div class="featured-card">
                <div class="card-image-wrapper">
                    <img src="assets/img/briket_kelapa.jpeg" alt="Briket Kotak">
                    <span class="card-badge-populer">Best Seller</span>
                </div>
                <div class="card-details">
                    <h3>Briket Kotak</h3>
                    <p class="card-description">Briket kubus padat dari tempurung kelapa asli. Minim asap, tanpa bau,
                        cocok banget buat barbeque atau angkringan.</p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 20.000</span>
                        <span class="card-stock">Stok: 50</span>
                    </div>
                    <a href="detail_produk.php?id=9" class="btn-view-detail">Lihat Produk</a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="home-extended-section">
    <div class="extended-container">
        <!-- --- Section Keunggulan Briket --- -->
        <div class="features-container">
            <div class="feature-card">
                <div class="feature-icon">🔥</div>
                <h3>Panas Tinggi & Stabil</h3>
                <p>Menghasilkan kalori panas yang tinggi dan konstan, membuat proses pembakaran jauh lebih cepat dan
                    efisien tanpa perlu sering ditambah.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💨</div>
                <h3>100% Bebas Asap & Bau</h3>
                <p>Diproses alami tanpa bahan kimia terlarang, menghasilkan pembakaran yang bersih, tidak berbau, dan
                    sepenuhnya bebas dari asap tebal.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Zero Waste & Eco</h3>
                <p>Memanfaatkan 100% limbah murni tempurung kelapa, membantu mengurangi tumpukan sampah alam sekaligus
                    menjaga kelestarian bumi.</p>
            </div>
        </div>

        <!-- --- Section Kalkulator Energi Briket --- -->
        <div class="calculator-container">
            <div class="calc-info">
                <h2>Hitung Kontribusi Hijaumu, Ral!</h2>
                <p>Gunakan kalkulator interaktif ini untuk melihat seberapa besar efisiensi energi dan dampak positif
                    yang lu berikan bagi bumi dengan beralih ke briket alami.</p>
            </div>

            <div class="calc-box">
                <label for="briket-qty">Berapa kilogram briket yang lu butuhkan?</label>
                <input type="number" id="briket-qty" value="1" min="1" oninput="hitungEfisiensi()">
                <div class="calc-results">
                    <div class="result-card">
                        <h3 id="res-hours">15</h3>
                        <p>Jam Total Bara Menyala</p>
                    </div>
                    <div class="result-card highlight">
                        <h3 id="res-carbon">40%</h3>
                        <p>Emisi Karbon Dikurangi</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="home-lifecycle-section">
    <!-- --- Section Alur Sirkulasi Briket --- -->
    <div class="sirkulasi-section">
        <h2>Dari Limbah, Menjadi Energi Bersih</h2>
        <p class="subtitle">Gini cara kerja sirkulasi sirkular BriketKuy lu dalam memanfaatkan limbah menjadi bahan
            bakar berkualitas tinggi.</p>

        <div class="steps-container">
            <!-- Langkah 1 -->
            <div class="step-item">
                <div class="step-number">1</div>
                <h3>Pengumpulan Tempurung</h3>
                <p>Limbah batok kelapa tua sisa industri rumahan yang awalnya dibuang dan menumpuk, kami kumpulkan
                    kembali untuk didaur ulang.</p>
            </div>

            <!-- Langkah 2 -->
            <div class="step-item">
                <div class="step-number">2</div>
                <h3>Karbonisasi & Pengayakan</h3>
                <p>Batok kelapa dibakar secara terkontrol menjadi arang, lalu dihancurkan dan diayak halus guna
                    menghasilkan bubuk arang murni.</p>
            </div>

            <!-- Langkah 3 -->
            <div class="step-item">
                <div class="step-number">3</div>
                <h3>Pencetakan Alami</h3>
                <p>Bubuk arang dicampur perekat alami dari tepung tapioka organik tanpa campuran bahan kimia, lalu
                    dicetak padat menjadi briket.</p>
            </div>

            <!-- Langkah 4 -->
            <div class="step-item">
                <div class="step-number">4</div>
                <h3>Pembakaran Maksimal</h3>
                <p>Briket siap digunakan untuk memasak atau industri dengan bara yang stabil, tahan lama, tanpa bau, dan
                    100% bebas dari asap tebal.</p>
            </div>
        </div>
    </div>
</section>


<section class="home-quiz-section">
    <div class="quiz-container">

        <div class="quiz-header" id="quiz-main-header">
            <h2>Cari Tahu Jenis Briket Terbaik Buat Lu! 🔥</h2>
            <p>Jawab kuis interaktif ini untuk menemukan spesifikasi briket ideal yang paling pas dengan rencana
                penggunaan dan kebutuhan lu.</p>
            <div class="quiz-progress-bar-container">
                <div class="quiz-progress-fill" id="quiz-progress-fill" style="width: 25%;"></div>
            </div>
        </div>

        <div id="quiz-page-1" class="quiz-card-box">
            <p class="quiz-question-counter">Pertanyaan 1 dari 4</p>
            <p class="quiz-question">Gimana rencana penggunaan briket utama lu nanti?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(1, 'shisha')">Untuk Shisha / Hookah (Butuh abu
                    minim)</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(1, 'memasak')">Untuk Memasak / Pemanggang Barbeque
                    (BBQ)</button>
            </div>
        </div>

        <div id="quiz-page-2" class="quiz-card-box style-hidden">
            <p class="quiz-question-counter">Pertanyaan 2 dari 4</p>
            <p class="quiz-question">Bentuk potongan briket mana yang lebih lu sukai untuk digunakan?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(2, 'cube')">Bentuk Kubus / Cube (Panas merata di area
                    kecil)</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(2, 'hexagonal')">Bentuk Hexagonal / Silinder
                    (Sirkulasi udara bara baik)</button>
            </div>
        </div>

        <div id="quiz-page-3" class="quiz-card-box style-hidden">
            <p class="quiz-question-counter">Pertanyaan 3 dari 4</p>
            <p class="quiz-question">Berapa lama durasi pembakaran yang lu harepin pas lagi dipakai?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(3, 'standar')">Sekitar 2 - 3 Jam (Cukup untuk sesi
                    santai / rumahan)</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(3, 'premium')">Di atas 4 Jam / Super Awet (Skala
                    bisnis / resto / ekspor)</button>
            </div>
        </div>

        <div id="quiz-page-4" class="quiz-card-box style-hidden">
            <p class="quiz-question-counter">Pertanyaan 4 dari 4</p>
            <p class="quiz-question">Berapa banyak kuantitas briket yang biasanya lu pesan?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(4, 'eceran')">Eceran kecil (Beli per kilogram buat
                    stok dapur)</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(4, 'grosir')">Grosir besar (Beli per box / tonase
                    buat usaha)</button>
            </div>
        </div>

        <div id="quiz-result-box" class="quiz-result-box style-hidden">
            <div class="quiz-result-badge">Hasil Rekomendasi Briket Lu</div>
            <h3 id="quiz-result-title">Premium Cube Briket</h3>
            <p id="quiz-result-desc">Deskripsi rekomendasi jenis briket yang paling efisien berdasarkan jawaban lu.</p>

            <div class="recommended-pot-card">
                <h5>Rekomendasi Kemasan:</h5>
                <strong id="quiz-pot-name">Master Box Eco-Kuy</strong>
                <p id="quiz-pot-desc">Sangat pas untuk menjaga briket tetap kering, terhindar dari kelembaban udara, dan
                    anti hancur.</p>
            </div>

            <button class="btn-reset-quiz" onclick="resetKuis()">Coba Kuis Lagi</button>
        </div>

    </div>
</section>

<script>
function hitungEfisiensi() {
    // Ambil elemen input angka kg briket
    let inputElement = document.getElementById('briket-qty');

    // Ambil elemen teks tempat nampilin hasil jam dan emisi karbon
    let resHours = document.getElementById('res-hours');
    let resCarbon = document.getElementById('res-carbon');

    // Pastikan semua elemen HTML-nya ketemu dan gak null
    if (inputElement && resHours && resCarbon) {
        let qty = parseFloat(inputElement.value);

        if (!isNaN(qty) && qty > 0) {
            // 1. Hitung jam bara (1 kg = 3 jam)
            resHours.innerText = qty * 3;

            // 2. Hitung emisi karbon dinamis (misal: qty dikali 5%)
            let hitungEmisi = qty * 5;

            // Batasi persentase maksimal biar gak tembus 100% (misal mentok di 95%)
            if (hitungEmisi > 95) {
                hitungEmisi = 95;
            }

            // Tampilkan hasil persentase baru ke layar
            resCarbon.innerText = hitungEmisi + "%";

        } else {
            // Jika input kosong, diisi 0, atau minus, kembalikan ke angka 0
            resHours.innerText = 0;
            resCarbon.innerText = "0%";
        }
    }
};

document.addEventListener('DOMContentLoaded', function() {
    // --- 1. Logika Kalkulator Dampak Lingkungan ---
    const inputPot = document.getElementById('pot-count');
    const plasticSaved = document.getElementById('plastic-saved');
    const earthHappy = document.getElementById('earth-happy');

    if (inputPot) {
        function hitungDampak() {
            let jumlah = parseInt(inputPot.value) || 0;
            let totalPlastik = jumlah * 45;
            let persentaseSubur = Math.min(jumlah * 8, 100);

            if (plasticSaved) plasticSaved.innerText = totalPlastik.toLocaleString('id-ID');
            if (earthHappy) earthHappy.innerText = persentaseSubur + '%';
        }
        inputPot.addEventListener('input', hitungDampak);
        hitungDampak();
    }
});

// Simpan jawaban user di dalam object
let jawabanUser = {
    tujuan: '', // shisha / memasak
    bentuk: '', // cube / hexagonal
    durasi: '', // standar / premium
    kuantitas: '' // eceran / grosir
};

// Fungsi utama pas user klik tombol pilihan jawaban
function pilihOpsi(halamanSekarang, nilaiJawaban) {
    // 1. Simpan jawaban sesuai halaman kuis
    if (halamanSekarang === 1) {
        jawabanUser.tujuan = nilaiJawaban;
    } else if (halamanSekarang === 2) {
        jawabanUser.bentuk = nilaiJawaban;
    } else if (halamanSekarang === 3) {
        jawabanUser.durasi = nilaiJawaban;
    } else if (halamanSekarang === 4) {
        jawabanUser.kuantitas = nilaiJawaban;
    }

    // 2. Update Progress Bar secara visual
    let progressFill = document.getElementById('quiz-progress-fill');
    if (progressFill) {
        let persenProgress = (halamanSekarang) * 25; // 4 halaman = 25%, 50%, 75%, 100%
        progressFill.style.width = persenProgress + '%';
    }

    // 3. Pindah Halaman Kuis (Sembunyikan yang sekarang, munculkan yang berikutnya)
    let halamanAktif = document.getElementById('quiz-page-' + halamanSekarang);
    if (halamanAktif) {
        halamanAktif.classList.add('style-hidden');
    }

    let halamanBerikutnya = halamanSekarang + 1;

    if (halamanBerikutnya <= 4) {
        // Jika belum pertanyaan terakhir, buka halaman pertanyaan selanjutnya
        let targetHalaman = document.getElementById('quiz-page-' + halamanBerikutnya);
        if (targetHalaman) {
            targetHalaman.classList.remove('style-hidden');
        }
    } else {
        // Jika sudah menjawab pertanyaan ke-4, hitung hasil akhir
        tampilkanHasilKuis();
    }
}

// Fungsi untuk mengolah jawaban dan menampilkan hasil rekomendasi briket
function tampilkanHasilKuis() {
    // Sembunyikan header utama kuis (judul & progress bar) agar fokus ke hasil
    let headerKuis = document.getElementById('quiz-main-header');
    if (headerKuis) {
        headerKuis.classList.add('style-hidden');
    }

    // Ambil semua elemen DOM halaman hasil
    let resultBox = document.getElementById('quiz-result-box');
    let resultTitle = document.getElementById('quiz-result-title');
    let resultDesc = document.getElementById('quiz-result-desc');
    let potName = document.getElementById('quiz-pot-name');
    let potDesc = document.getElementById('quiz-pot-desc');

    // Penentuan Rekomendasi berdasarkan input utama (Tujuan & Bentuk)
    if (jawabanUser.tujuan === 'shisha' || jawabanUser.bentuk === 'cube') {
        // --- HASIL 1: TIPE CUBE SHISHA ---
        resultTitle.innerText = "Premium Cube Charcoal Briket (Shisha Edition)";
        resultDesc.innerText =
            "Berdasarkan jawaban lu, briket tipe Cube sangat cocok karena memiliki abu putih yang sangat minim, tanpa aroma, dan tidak merubah rasa asap shisha/hookah lu. Panasnya fokus dan konsisten!";

        // Sesuaikan rekomendasi kemasan berdasarkan kuantitas beli
        if (jawabanUser.kuantitas === 'grosir') {
            potName.innerText = "Master Box Carton 10kg - Ekspor Quality";
            potDesc.innerText =
                "Kemasan box tebal berlapis plastik dalam, sangat pas menjaga briket massal lu tetap kering dan anti lembab selama pengiriman skala besar.";
        } else {
            potName.innerText = "Eco-Pack Inner Plastic 1kg";
            potDesc.innerText =
                "Kemasan retail praktis kedap udara yang pas ditaruh di dalam ruangan tanpa makan tempat.";
        }

    } else {
        // --- HASIL 2: TIPE HEXAGONAL BBQ ---
        resultTitle.innerText = "Premium Hexagonal Briket (BBQ & Cooking Edition)";
        resultDesc.innerText =
            "Pilihan pas buat lu! Briket Hexagonal punya lubang sirkulasi udara di tengahnya, bikin bara api menyala super awet (up to 4-5 jam) dan menghasilkan tingkat panas tinggi yang ideal untuk panggangan daging BBQ atau resto.";

        // Sesuaikan rekomendasi kemasan berdasarkan kuantitas beli
        if (jawabanUser.kuantitas === 'grosir') {
            potName.innerText = "Heavy-Duty Sack / Box 20kg";
            potDesc.innerText =
                "Wadah kokoh pelindung briket silinder agar tidak mudah patah atau hancur saat ditumpuk di gudang usaha lu.";
        } else {
            potName.innerText = "Medium Box Portable 3kg";
            potDesc.innerText =
                "Kemasan pas buat dibawa nongkrong, camping, atau pelengkap alat panggangan praktis di rumah.";
        }
    }

    // Munculkan box hasil ke layar
    if (resultBox) {
        resultBox.classList.remove('style-hidden');
    }
}

// Fungsi untuk mereset kuis kembali ke pertanyaan pertama
function resetKuis() {
    // Reset data jawaban
    jawabanUser = {
        tujuan: '',
        bentuk: '',
        durasi: '',
        kuantitas: ''
    };

    // Sembunyikan box hasil
    let resultBox = document.getElementById('quiz-result-box');
    if (resultBox) {
        resultBox.classList.add('style-hidden');
    }

    // Munculkan kembali header utama kuis dan reset progress fill ke 25%
    let headerKuis = document.getElementById('quiz-main-header');
    let progressFill = document.getElementById('quiz-progress-fill');
    if (headerKuis) {
        headerKuis.classList.remove('style-hidden');
    }
    if (progressFill) {
        progressFill.style.width = '25%';
    }

    // Sembunyikan halaman pertanyaan 2, 3, 4 jika ada yang terbuka
    for (let i = 2; i <= 4; i++) {
        let page = document.getElementById('quiz-page-' + i);
        if (page) {
            page.classList.add('style-hidden');
        }
    }

    // Munculkan kembali pertanyaan halaman pertama
    let page1 = document.getElementById('quiz-page-1');
    if (page1) {
        page1.classList.remove('style-hidden');
    }
};
// Penampung State Skor Kuis
</script>

<style>
/* ==========================================================================
   STYLE MASTER WEBSITE (Seluruh properti CSS ditulis terpisah ke bawah)
   ========================================================================== */

/* --- 1. Style Hero Banner --- */
.hero-banner-section {
    background-image: url('assets/img/hijau.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    padding: 0 20px;
}

.hero-overlay-content {
    text-align: center;
    max-width: 800px;
}

.hero-overlay-content h1 {
    font-size: 48px;
    color: #20970d;
    margin: 0;
    margin-bottom: 24px;
    font-weight: 700;
    line-height: 1.3;
}

.hero-overlay-content p {
    font-size: 18px;
    color: #038009;
    margin: 0;
    line-height: 1.6;
}

/* --- Shared Title Component --- */
.section-title-wrapper {
    text-align: center;
    margin-bottom: 60px;
}

.section-title-wrapper h2 {
    font-size: 32px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 12px;
    font-weight: 700;
}

.section-title-wrapper p {
    font-size: 16px;
    color: #64748b;
    margin: 0;
}

/* --- 2. Style Extended & Calculator --- */
.home-extended-section {
    background-image: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('assets/img/hijau1.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding-top: 100px;
    padding-bottom: 100px;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
    width: 100%;
}

/* Biar teks judul section di atas background ini berubah jadi putih terang */
.home-extended-section .section-title-wrapper h2 {
    color: #1cd40b !important;
}

.home-extended-section .section-title-wrapper p {
    color: #cbd5e1 !important;
}

/* Biar teks info kalkulator di kiri juga kontras */
.calc-info h2 {
    color: #2df60e;
}

.calc-info p {
    color: #3dea12;
}

.extended-container {
    max-width: 1200px;
    margin: 0 auto;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 90px;
}

.feature-box {
    background-color: #ffffff;
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
    border: 1px solid #f1f5f9;
    text-align: center;
    transition: transform 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-5px);
}

.feature-icon {
    font-size: 40px;
    margin-bottom: 20px;
}

.feature-box h3 {
    font-size: 20px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 12px;
    font-weight: 700;
}

.feature-box p {
    font-size: 14.5px;
    color: #9adb17;
    margin: 0;
    line-height: 1.6;
}

.calculator-wrapper {
    display: grid;
    grid-template-columns: 45% 55%;
    gap: 50px;
    align-items: center;
    background-color: #ffffff;
    padding: 50px;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
    border: 1px solid #f1f5f9;
    box-sizing: border-box;
}

.calc-info h2 {
    font-size: 32px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 16px;
    font-weight: 700;
    line-height: 1.3;
}

.calc-info p {
    font-size: 16px;
    color: #64748b;
    margin: 0;
    line-height: 1.6;
}

.calc-box {
    background-color: #f8fafc;
    padding: 35px;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
}

.input-group {
    display: flex;
    flex-direction: column;
}

.input-group label {
    font-size: 15px;
    color: #334155;
    margin-bottom: 12px;
    font-weight: 600;
}

.input-group input {
    padding: 14px 18px;
    font-size: 16px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    background-color: #ffffff;
    color: #1e293b;
    font-weight: 600;
    outline: none;
    transition: border-color 0.2s ease;
}

.input-group input:focus {
    border-color: #2e7d32;
}

.calc-divider {
    border: 0;
    height: 1px;
    background-color: #e2e8f0;
    margin: 25px 0;
}

.results-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.result-card {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    display: flex;
    flex-direction: column;
}

.result-card.highlight {
    background-color: #e8f5e9;
    border-color: #c8e6c9;
}

.result-number {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 4px;
}

.result-card.highlight .result-number {
    color: #2e7d32;
}

.result-label {
    font-size: 13px;
    color: #64748b;
    font-weight: 500;
}

/* --- 3. Style Siklus Hidup Timeline --- */
.home-lifecycle-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 100px 20px;
    box-sizing: border-box;
}

.timeline-container {
    position: relative;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    padding-top: 20px;
}

.timeline-line {
    position: absolute;
    top: 40px;
    left: 40px;
    right: 40px;
    height: 2px;
    background-color: #e2e8f0;
    z-index: 1;
}

.timeline-item {
    position: relative;
    z-index: 2;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
}

.timeline-dot {
    width: 40px;
    height: 40px;
    background-color: #2e7d32;
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 20px;
    box-shadow: 0 0 0 6px #ffffff;
}

.timeline-content h4 {
    font-size: 18px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 8px;
    font-weight: 700;
}

.timeline-content p {
    font-size: 14px;
    color: #64748b;
    margin: 0;
    line-height: 1.6;
}

/* --- 4. Style Mini Fun Quiz (Satu Page Per Soal) --- */
.home-quiz-section {
    background-image: linear-gradient(rgba(241, 245, 219, 0.85), rgba(241, 245, 219, 0.85)), url('assets/img/hijau2.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding-top: 100px;
    padding-bottom: 100px;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
    width: 100%;
}

.quiz-container {
    max-width: 720px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 45px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    box-sizing: border-box;
}

.quiz-header {
    text-align: center;
    margin-bottom: 35px;
}

.quiz-header h2 {
    font-size: 28px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 8px;
    font-weight: 700;
}

.quiz-header p {
    font-size: 15px;
    color: #64748b;
    margin: 0;
    margin-bottom: 24px;
}

/* Progress Bar Kuis */
.quiz-progress-bar-container {
    width: 100%;
    height: 6px;
    background-color: #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
}

.quiz-progress-fill {
    height: 100%;
    width: 0%;
    background-color: #2e7d32;
    transition: width 0.3s ease;
}

/* Card Box Pertanyaan */
.quiz-card-box {
    text-align: center;
    width: 100%;
}

.quiz-question-counter {
    font-size: 13px;
    text-transform: uppercase;
    color: #2e7d32;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0;
    margin-bottom: 10px;
}

.quiz-question {
    font-size: 19px;
    color: #1e293b;
    font-weight: 600;
    margin: 0;
    margin-bottom: 30px;
    line-height: 1.5;
}

.quiz-options {
    display: flex;
    flex-direction: column;
    gap: 14px;
    width: 100%;
}

.btn-quiz-option {
    background-color: #f8fafc;
    color: #334155;
    border: 1px solid #e2e8f0;
    padding: 16px 24px;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    text-align: left;
    transition: all 0.2s ease;
    width: 100%;
    outline: none;
    box-sizing: border-box;
}

.btn-quiz-option:hover {
    background-color: #e8f5e9;
    color: #2e7d32;
    border-color: #a5d6a7;
    padding-left: 30px;
}

/* Card Box Hasil Akhir */
.quiz-result-box {
    text-align: center;
    animation: fadeInQuiz 0.4s ease forwards;
}

.quiz-result-badge {
    display: inline-block;
    background-color: #e8f5e9;
    color: #2e7d32;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 12.5px;
    font-weight: 700;
    margin-bottom: 16px;
}

.quiz-result-box h3 {
    font-size: 24px;
    color: #1e293b;
    margin: 0;
    margin-bottom: 12px;
    font-weight: 700;
}

.quiz-result-box p {
    font-size: 15px;
    color: #475569;
    line-height: 1.6;
    margin: 0;
    margin-bottom: 30px;
}

/* Card Rekomendasi Produk */
.recommended-pot-card {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 30px;
    text-align: left;
}

.recommended-pot-card h5 {
    margin: 0;
    font-size: 13px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 6px;
}

.recommended-pot-card strong {
    display: block;
    font-size: 16px;
    color: #2e7d32;
    margin-bottom: 4px;
}

.recommended-pot-card p {
    margin: 0;
    font-size: 13.5px;
    color: #64748b;
    line-height: 1.4;
}

.btn-reset-quiz {
    background-color: transparent;
    color: #94a3b8;
    border: 1px solid #cbd5e1;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-reset-quiz:hover {
    color: #475569;
    border-color: #94a3b8;
    background-color: #f8fafc;
}

/* Helper Class Animation & State */
.style-hidden {
    display: none !important;
}

@keyframes fadeInQuiz {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* --- Responsive Media Queries --- */
@media (max-width: 992px) {
    .hero-overlay-content h1 {
        font-size: 36px;
    }

    .features-grid,
    .timeline-container {
        grid-template-columns: repeat(2, 1fr);
    }

    .timeline-line {
        display: none;
    }

    .calculator-wrapper {
        grid-template-columns: 100%;
        gap: 30px;
        padding: 30px;
    }
}

@media (max-width: 600px) {

    .features-grid,
    .timeline-container {
        grid-template-columns: 100%;
    }

    .results-grid {
        grid-template-columns: 100%;
    }

    .home-extended-section,
    .home-lifecycle-section,
    .home-quiz-section {
        padding: 60px 15px;
    }

    .quiz-container {
        padding: 30px 20px;
    }
}

.style-hidden {
    display: none !important;
}

/* --- Styling Kartu Keunggulan --- */
.features-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 50px;
    margin-bottom: 50px;
    padding-left: 20px;
    padding-right: 20px;
}

.feature-card {
    background-color: #ffffff;
    border-radius: 12px;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 24px;
    padding-right: 24px;
    text-align: center;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    width: 300px;
    transition: transform 0.2s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

.feature-card h3 {
    color: #1e293b;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 12px;
}

.feature-card p {
    color: #64748b;
    font-size: 14px;
    line-height: 1.6;
    margin-top: 0;
    margin-bottom: 0;
}

/* --- Styling Komponen Kalkulator --- */
.calculator-container {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    max-width: 1000px;
    margin-top: 40px;
    margin-bottom: 60px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 40px;
    padding-bottom: 40px;
    padding-left: 40px;
    padding-right: 40px;
    display: flex;
    gap: 40px;
    align-items: center;
}

.calc-info {
    flex: 1;
}

.calc-info h2 {
    color: #1e293b;
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 15px;
}

.calc-info p {
    color: #475569;
    font-size: 15px;
    line-height: 1.6;
}

.calc-box {
    flex: 1;
    background-color: #ffffff;
    border-radius: 12px;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 30px;
    padding-right: 30px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.calc-box label {
    display: block;
    color: #334155;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 10px;
}

.calc-box input {
    width: 100%;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 16px;
    padding-right: 16px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 16px;
    color: #1e293b;
    outline: none;
    box-sizing: border-box;
}

.calc-results {
    display: flex;
    gap: 20px;
    margin-top: 25px;
}

.result-card {
    flex: 1;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
}

.result-card h3 {
    color: #1e293b;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 5px;
    margin-top: 0;
}

.result-card p {
    color: #64748b;
    font-size: 13px;
    margin-top: 0;
    margin-bottom: 0;
}

.result-card.highlight {
    background-color: #f0fdf4;
    border-color: #bbf7d0;
}

.result-card.highlight h3 {
    color: #16a34a;
}

/* --- Styling Area Utama Sirkulasi --- */
.sirkulasi-section {
    text-align: center;
    padding-top: 60px;
    padding-bottom: 60px;
}

.sirkulasi-section h2 {
    color: #1e293b;
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 10px;
}

.sirkulasi-section .subtitle {
    color: #64748b;
    font-size: 15px;
    margin-bottom: 50px;
}

/* --- Container Langkah --- */
.steps-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 30px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

.step-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* --- MENGUBAH LINGKARAN ANGKA MENJADI ORANGE --- */
.step-number {
    background-color: #f97316;
    color: #ffffff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 20px;
    position: relative;
    box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.2);
}

/* --- Styling Teks Judul Langkah & Deskripsi --- */
.step-item h3 {
    color: #1e293b;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 12px;
    margin-top: 0;
}

.step-item p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.6;
    margin-top: 0;
    margin-bottom: 0;
}

.promo-banner-section {
    background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
    padding-top: 60px;
    padding-bottom: 60px;
    margin-bottom: 40px;
    border-bottom: 1px solid #fed7aa;
    width: 100%;
    box-sizing: border-box;
}

.promo-banner-container {
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 40px;
}

.promo-content {
    flex: 1;
    max-width: 650px;
}

.promo-badge {
    background-color: #ffedd5;
    color: #ea580c;
    border: 1px solid #fed7aa;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-left: 12px;
    padding-right: 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 700;
    display: inline-block;
    margin-bottom: 16px;
}

.promo-content h1 {
    font-size: 38px;
    color: #1e293b;
    font-weight: 800;
    line-height: 1.2;
    margin-top: 0;
    margin-bottom: 16px;
}

.promo-content p {
    font-size: 16px;
    color: #475569;
    line-height: 1.6;
    margin-top: 0;
    margin-bottom: 30px;
}

.promo-actions {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.btn-promo-primary {
    background-color: #f97316;
    color: #ffffff;
    text-decoration: none;
    padding-top: 14px;
    padding-bottom: 14px;
    padding-left: 28px;
    padding-right: 28px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
    transition: all 0.2s ease;
}

.btn-promo-primary:hover {
    background-color: #ea580c;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(234, 88, 12, 0.3);
}

.promo-code-box {
    background-color: #ffffff;
    border: 2px dashed #cbd5e1;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.code-label {
    font-size: 14px;
    color: #64748b;
}

.code-text {
    font-size: 16px;
    color: #1e293b;
    font-weight: 700;
    letter-spacing: 1px;
}

.promo-illustration {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.promo-emoji-wrapper {
    font-size: 120px;
    animation: bounce 3s ease-in-out infinite;
}

/* Animasi melayang halus biar bannernya makin interaktif */
@keyframes bounce {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-15px);
    }
}

/* Mencegah tampilan berantakan di layar HP/Mobile */
@media (max-width: 768px) {
    .promo-banner-container {
        flex-direction: column-reverse;
        text-align: center;
        gap: 20px;
    }

    .promo-actions {
        justify-content: center;
    }

    .promo-emoji-wrapper {
        font-size: 80px;
    }

    .promo-content h1 {
        font-size: 28px;
    }
}

.featured-products-section {
    padding-top: 60px;
    padding-bottom: 60px;
    background-color: #ffffff;
    width: 100%;
    box-sizing: border-box;
}

.featured-container {
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

.featured-header {
    text-align: center;
    margin-bottom: 40px;
}

.featured-subtitle {
    color: #f97316;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.featured-header h2 {
    font-size: 32px;
    color: #1e293b;
    margin-top: 8px;
    margin-bottom: 12px;
    font-weight: 800;
}

.featured-header p {
    color: #64748b;
    font-size: 16px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}

.featured-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    width: 100%;
}

.featured-card {
    background-color: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.featured-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
}

.card-image-wrapper {
    position: relative;
    width: 100%;
    height: 200px;
    background-color: #f8fafc;
}

.card-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-badge-populer {
    position: absolute;
    top: 12px;
    left: 12px;
    background-color: #ef4444;
    color: #ffffff;
    padding-top: 4px;
    padding-bottom: 4px;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}

.card-details {
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.card-details h3 {
    font-size: 18px;
    color: #1e293b;
    margin-top: 0;
    margin-bottom: 10px;
    font-weight: 700;
}

.card-description {
    font-size: 14px;
    color: #64748b;
    line-height: 1.5;
    margin-top: 0;
    margin-bottom: 20px;
    flex: 1;
}

.card-footer-action {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.card-price {
    font-size: 18px;
    color: #f97316;
    font-weight: 700;
}

.card-stock {
    font-size: 13px;
    color: #94a3b8;
    background-color: #f1f5f9;
    padding-top: 2px;
    padding-bottom: 2px;
    padding-left: 8px;
    padding-right: 8px;
    border-radius: 4px;
}

.btn-view-detail {
    display: block;
    text-align: center;
    background-color: #1e293b;
    color: #ffffff;
    text-decoration: none;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    transition: background-color 0.2s;
}

.btn-view-detail:hover {
    background-color: #0f172a;
}

.no-products {
    text-align: center;
    color: #94a3b8;
    grid-column: 1 / -1;
    padding: 40px;
}
</style>