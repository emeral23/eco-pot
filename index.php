<?php 
// Start session di paling atas jika navbar lu membutuhkan data user login
session_start();

include 'includes/header.php'; 
?>

<section class="hero-banner-section">
    <div class="hero-overlay-content">
        <h1>Menumbuhkan Kehidupan,<br>Menjaga Masa Depan</h1>
        <p>Setiap pot ramah lingkungan membawa satu langkah lebih dekat menuju bumi yang lebih hijau dan selaras dengan
            alam.</p>
    </div>
</section>


<section class="home-extended-section">
    <div class="extended-container">

        <div class="features-grid">
            <div class="feature-box">
                <div class="feature-icon">🌱</div>
                <h3>100% Organik</h3>
                <p>Terbuat dari material alami pilihan yang dapat terurai sempurna tanpa meninggalkan limbah
                    mikroplastik beracun bagi tanah.</p>
            </div>

            <div class="feature-box">
                <div class="feature-icon">💧</div>
                <h3>Drainase Otomatis</h3>
                <p>Struktur serat alami mengalirkan sirkulasi air secara optimal, mencegah pembusukan akar tanaman
                    kesayangan lu.</p>
            </div>

            <div class="feature-box">
                <div class="feature-icon">🌍</div>
                <h3>Nutrisi Tambahan</h3>
                <p>Saat pot mulai terurai di dalam tanah, material organiknya langsung berubah menjadi kompos alami bagi
                    tumbuhan.</p>
            </div>
        </div>

        <div class="calculator-wrapper">
            <div class="calc-info">
                <h2>Hitung Kontribusi Hijaumu, Ral!</h2>
                <p>Gunakan kalkulator interaktif ini untuk melihat seberapa besar dampak positif yang lu berikan bagi
                    bumi hanya dengan mengubah kebiasaan menanam.</p>
            </div>

            <div class="calc-box">
                <div class="input-group">
                    <label for="pot-count">Berapa banyak pot yang lu gunakan di rumah?</label>
                    <input type="number" id="pot-count" value="5" min="1" max="100">
                </div>

                <hr class="calc-divider">

                <div class="results-grid">
                    <div class="result-card">
                        <span class="result-number" id="plastic-saved">0</span>
                        <span class="result-label">Gram Plastik Dikurangi</span>
                    </div>
                    <div class="result-card highlight">
                        <span class="result-number" id="earth-happy">0%</span>
                        <span class="result-label">Kesehatan Tanah Meningkat</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="home-lifecycle-section">
    <div class="section-title-wrapper">
        <h2>Dari Alam, Kembali Ke Alam</h2>
        <p>Gini cara kerja sirkulasi sirkular Eco-Pot lu dalam menjaga kelestarian lingkungan.</p>
    </div>

    <div class="timeline-container">
        <div class="timeline-line"></div>

        <div class="timeline-item">
            <div class="timeline-dot">1</div>
            <div class="timeline-content">
                <h4>Penyelamatan Limbah</h4>
                <p>Sabut kelapa kering sisa industri rumahan yang awalnya dibuang dan mengotori lingkungan kami
                    kumpulkan kembali.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot">2</div>
            <div class="timeline-content">
                <h4>Produksi Bersih</h4>
                <p>Serat sabut kelapa dicetak menggunakan perekat alami organik tanpa campuran bahan kimia sintetis
                    beracun.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot">3</div>
            <div class="timeline-content">
                <h4>Pertumbuhan Optimal</h4>
                <p>Pot digunakan untuk menanam. Porositas serat yang tinggi membantu akar tanaman lu bernapas dengan
                    leluasa.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot">4</div>
            <div class="timeline-content">
                <h4>Dekomposisi Sempurna</h4>
                <p>Saat tanaman membesar, lu tinggal kubur pot ini langsung ke tanah baru. Pot hancur jadi pupuk kompos
                    penyubur alami.</p>
            </div>
        </div>
    </div>
</section>


<section class="home-quiz-section">
    <div class="quiz-container">

        <div class="quiz-header" id="quiz-main-header">
            <h2>Cari Tahu Tanaman Jodoh Lu! 🪴</h2>
            <p>Jawab kuis interaktif ini untuk menemukan vegetasi ideal yang paling pas dengan kepribadian lu dan
                kondisi rumah.</p>
            <div class="quiz-progress-bar-container">
                <div class="quiz-progress-fill" id="quiz-progress-fill" style="width: 25%;"></div>
            </div>
        </div>

        <div id="quiz-page-1" class="quiz-card-box">
            <p class="quiz-question-counter">Pertanyaan 1 dari 4</p>
            <p class="quiz-question">Gimana kondisi pencahayaan di area menanam rumah lu?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(1, 'indoor')">Teduh / Di Dalam Ruangan</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(1, 'outdoor')">Panas Full Terkena Matahari</button>
            </div>
        </div>

        <div id="quiz-page-2" class="quiz-card-box style-hidden">
            <p class="quiz-question-counter">Pertanyaan 2 dari 4</p>
            <p class="quiz-question">Seberapa sering lu punya waktu luang buat menyiram tanaman kesayangan?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(2, 'rajin')">Rutin tiap hari, hobi ngurusin
                    tanaman</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(2, 'cuek')">Sering lupa/sibuk, mau yang tahan
                    ditinggal</button>
            </div>
        </div>

        <div id="quiz-page-3" class="quiz-card-box style-hidden">
            <p class="quiz-question-counter">Pertanyaan 3 dari 4</p>
            <p class="quiz-question">Apa tujuan utama lu pengen melihara tumbuhan baru ini?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(3, 'konsumsi')">Pengen dipanen hasilnya buat konsumsi
                    / bumbu dapur</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(3, 'estetika')">Buat hiasan estetik meja kerja /
                    pembersih udara</button>
            </div>
        </div>

        <div id="quiz-page-4" class="quiz-card-box style-hidden">
            <p class="quiz-question-counter">Pertanyaan 4 dari 4</p>
            <p class="quiz-question">Seberapa luas sisa tempat yang lu sediakan di rumah?</p>
            <div class="quiz-options">
                <button class="btn-quiz-option" onclick="pilihOpsi(4, 'sempit')">Sempit banget (cuma muat di ambang
                    jendela / rak kecil)</button>
                <button class="btn-quiz-option" onclick="pilihOpsi(4, 'luas')">Lumayan lapang (teras depan / ditaruh
                    sudut lantai)</button>
            </div>
        </div>

        <div id="quiz-result-box" class="quiz-result-box style-hidden">
            <div class="quiz-result-badge">Hasil Jodoh Vegetasi Lu</div>
            <h3 id="quiz-result-title">Nama Tanaman</h3>
            <p id="quiz-result-desc">Deskripsi rekomendasi kecocokan.</p>

            <div class="recommended-pot-card">
                <h5>Rekomendasi Wadah:</h5>
                <strong id="quiz-pot-name">Eco-Pot Mini</strong>
                <p id="quiz-pot-desc">Sangat pas untuk menjaga kestabilan akar jenis tanaman ini.</p>
            </div>

            <button class="btn-reset-quiz" onclick="resetKuis()">Coba Kuis Lagi</button>
        </div>

    </div>
</section>

<script>
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

// Penampung State Skor Kuis
let akumulasiPoin = {
    indoor: 0,
    outdoor: 0,
    rajin: 0,
    cuek: 0,
    konsumsi: 0,
    estetika: 0,
    sempit: 0,
    luas: 0
};

// Fungsi Trigger Saat Tombol Opsi Diklik
// Fungsi Trigger Saat Tombol Opsi Diklik
function pilihOpsi(halamanSekarang, keyPoin) {
    // 1. Tambah skor pilihan user (Sudah diperbaiki jadi 'akumulasiPoin')
    if (akumulasiPoin.hasOwnProperty(keyPoin)) {
        akumulasiPoin[keyPoin]++;
    }

    // 2. Sembunyikan halaman soal yang baru aja dijawab
    document.getElementById(`quiz-page-${halamanSekarang}`).classList.add('style-hidden');

    // 3. Cek apakah masih ada soal berikutnya atau sudah selesai
    let halamanBerikutnya = halamanSekarang + 1;
    const progressFill = document.getElementById('quiz-progress-fill');

    if (halamanBerikutnya <= 4) {
        // Update progress bar
        let persen = (halamanBerikutnya / 4) * 100;
        progressFill.style.width = persen + "%";

        // Tampilkan halaman soal berikutnya
        document.getElementById(`quiz-page-${halamanBerikutnya}`).classList.remove('style-hidden');
    } else {
        // Jika sudah halaman terakhir, tampilkan kalkulasi hasil
        progressFill.style.width = "100%";
        hitungHasilAkhir();
    }
}

// Fungsi Evaluasi Skor & Rekomendasi Tanaman Berbeda
function hitungHasilAkhir() {
    const resultBox = document.getElementById('quiz-result-box');
    const resTitle = document.getElementById('quiz-result-title');
    const resDesc = document.getElementById('quiz-result-desc');
    const potName = document.getElementById('quiz-pot-name');
    const potDesc = document.getElementById('quiz-pot-desc');

    resultBox.classList.remove('style-hidden');

    // Algoritma penentuan jenis tanaman berdasarkan poin
    if (acumulasiPoin.indoor > acumulasiPoin.outdoor && acumulasiPoin.estetika >= acumulasiPoin.konsumsi) {
        resTitle.innerText = "Jodoh Lu: Monstera Adansonii! 🌿";
        resDesc.innerText =
            "Lu menyukai keindahan visual dalam ruangan yang menenangkan. Jenis tanaman ini sangat ideal ditaruh di meja kerja atau rak ruang tamu tanpa perlu terkena terik matahari langsung.";
        potName.innerText = "Eco-Pot Sedang (Rp 20.000)";
        potDesc.innerText =
            "Sesuai database produk lu, Eco-Pot ukuran sedang memberikan sirkulasi udara mikro pada akar Monstera agar tidak lembab berlebih.";

    } else if (acumulasiPoin.outdoor > acumulasiPoin.indoor && acumulasiPoin.konsumsi >= acumulasiPoin.estetika) {
        resTitle.innerText = "Jodoh Lu: Tanaman Cabai Rawit & Tomat! 🌶️";
        resDesc.innerText =
            "Lu orangnya produktif dan suka memanfaatkan pekarangan luar untuk menghasilkan sesuatu yang berguna. Tanaman ini butuh asupan matahari penuh luar ruangan.";
        potName.innerText = "Eco-Pot Semai / Peat Pots (Rp 37.500)";
        potDesc.innerText =
            "Sangat mantap untuk fase penyemaian bibit tanaman bumbu dapur sebelum akar menembus pot dan siap dikubur langsung ke tanah pekarangan lu.";

    } else if (acumulasiPoin.cuek > acumulasiPoin.rajin) {
        resTitle.innerText = "Jodoh Lu: Kaktus & Sukulen Minimalis! 🌵";
        resDesc.innerText =
            "Lu punya mobilitas tinggi atau sering lupa menyiram tanaman. Sukulen adalah tipe mandiri yang menyimpan cadangan air tinggi dan gak manja dalam perawatan harian.";
        potName.innerText = "Eco-Pot Mini (Rp 10.000)";
        potDesc.innerText =
            "Ukurannya yang imut (Rp 10.000) pas banget ditaruh di sisa sudut meja kamar dengan drainase bawah anti genangan air pembusuk kaktus.";

    } else {
        resTitle.innerText = "Jodoh Lu: Tanaman Hias Gantung Srigading! 🍃";
        resDesc.innerText =
            "Lu adalah perawat tanaman yang telaten dan ingin suasana teras rumah lu terasa asri menjuntai indah dari langit-langit plafon.";
        potName.innerText = "Coco Fiber Pot (Serabut Kelapa) (Rp 30.000)";
        potDesc.innerText =
            "Tampilannya estetik alami (Rp 30.000), kuat menahan beban media tanam saat digantung di area luar rumah lu.";
    }
}

// Fungsi Reset state kuis kembali ke halaman 1
function resetKuis() {
    acumulasiPoin = {
        indoor: 0,
        outdoor: 0,
        rajin: 0,
        cuek: 0,
        konsumsi: 0,
        estetika: 0,
        sempit: 0,
        luas: 0
    };

    document.getElementById('quiz-result-box').classList.add('style-hidden');
    document.getElementById('quiz-progress-fill').style.width = "25%";

    // Tampilkan balik halaman pertama, sembunyikan sisanya
    document.getElementById('quiz-page-1').classList.remove('style-hidden');
    document.getElementById('quiz-page-2').classList.add('style-hidden');
    document.getElementById('quiz-page-3').classList.add('style-hidden');
    document.getElementById('quiz-page-4').classList.add('style-hidden');
}
</script>

<style>
/* ==========================================================================
   STYLE MASTER WEBSITE (Seluruh properti CSS ditulis terpisah ke bawah)
   ========================================================================== */

/* --- 1. Style Hero Banner --- */
.hero-banner-section {
    background-image: url('assets/img/eco-pot.jpg');
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
    color: #2e7d32;
    margin: 0;
    margin-bottom: 24px;
    font-weight: 700;
    line-height: 1.3;
}

.hero-overlay-content p {
    font-size: 18px;
    color: #475569;
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
    background-color: #f8fafc;
    padding: 100px 20px;
    box-sizing: border-box;
    width: 100%;
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
    color: #64748b;
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
    background-color: #f1f5f9;
    padding: 100px 20px;
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
</style>