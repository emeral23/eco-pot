<?php
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

        <!-- Kolom Kanan: Ringkasan Pesanan -->
        <div class="checkout-summary-section">
            <h3>Ringkasan Pesanan</h3>
            <div class="order-list">
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $item) : 
                    $sub = $item['harga'] * $item['jumlah'];
                    $total += $sub;
                ?>
                    <div class="order-item">
                        <span><?= $item['nama_produk']; ?> (x<?= $item['jumlah']; ?>)</span>
                        <span>Rp <?= number_format($sub, 0, ',', '.'); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div style="margin-top: 20px; display: flex; justify-content: space-between; font-weight: bold; font-size: 1.2rem;">
                <span>Total:</span>
                <span style="color: #2D7A35;">Rp <?= number_format($total, 0, ',', '.'); ?></span>
            </div>

            <button type="submit" class="btn-order">Pesan Sekarang</button>
        </div>

    </div>
</form>

<?php include '../includes/footer.php'; ?>