<?php
/** @var mysqli $koneksi */
session_start();
include '../config/database.php';
include '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/checkout.css">

<form action="proses_checkout.php" method="POST">
    <div class="checkout-container">

        <!-- Kolom Kiri: Input Data -->
        <div class="checkout-form-section">
            <h2>Form Pengiriman</h2>
            <div class="form-group">
                <label>Nama Lengkap Lu:</label>
                <input type="text" name="nama_penerima" placeholder="Masukkan nama lu..." required>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap:</label>
                <input type="text" name="alamat" placeholder="Alamat pengiriman..." required>
            </div>

            <div class="form-group">
                <label>Metode Pembayaran:</label>
                <select name="metode_pembayaran" required>
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet (Dana/OVO)</option>
                    <option value="COD">Bayar di Tempat (COD)</option>
                </select>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan Pesanan (Sudah Diperbaiki & Aman) -->
        <div class="checkout-summary-section">
            <h3>Ringkasan Pesanan</h3>
            <div class="order-list">
                <?php 
                $total = 0;
                
                // Pastikan session cart terisi dan tidak kosong
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    
                    // Loop session cart (Key: id_product, Value: jumlah beli)
                    foreach ($_SESSION['cart'] as $id_product => $jumlah) {
                        
                        // Ambil data produk segar langsung dari database agar nama & harga akurat
                        $query_db = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product = '$id_product'");
                        $product = mysqli_fetch_assoc($query_db);
                        
                        if ($product) {
                            // Antisipasi kalau isi session cart lu bertipe array bertingkat
                            $qty = is_array($jumlah) ? ($jumlah['jumlah'] ?? 1) : $jumlah;
                            
                            $sub = $product['harga'] * $qty;
                            $total += $sub;
                        ?>
                <div class="order-item">
                    <span><?= htmlspecialchars($product['nama_produk']); ?> (x<?= $qty; ?>)</span>
                    <span>Rp <?= number_format($sub, 0, ',', '.'); ?></span>
                </div>
                <?php 
                        }
                    }
                } else {
                    echo "<p style='color: #777; text-align: center; padding: 10px 0;'>Keranjang lu kosong, Ral.</p>";
                }
                ?>
            </div>

            <div
                style="margin-top: 20px; display: flex; justify-content: space-between; font-weight: bold; font-size: 1.2rem;">
                <span>Total:</span>
                <span style="color: #2D7A35;">Rp <?= number_format($total, 0, ',', '.'); ?></span>
            </div>

            <button type="submit" class="btn-order">Pesan Sekarang</button>
        </div>

    </div>
</form>

<?php include '../includes/footer.php'; ?>