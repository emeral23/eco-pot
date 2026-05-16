<?php
session_start();
include '../config/database.php';
include '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/cart.css">

<div class="cart-container">
    <h1 class="cart-title">Keranjang Belanja Lu</h1>

    <?php if (!empty($_SESSION['cart'])) : ?>
    <table class="cart-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $total_bayar = 0;
                foreach ($_SESSION['cart'] as $id => $item) : 
                    $subtotal = $item['harga'] * $item['jumlah'];
                    $total_bayar += $subtotal;
                ?>
            <tr>
                <td><?= $item['nama_produk']; ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                <td><?= $item['jumlah']; ?></td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                <td>
                    <a href="hapus_item.php?id=<?= $id; ?>" style="color: red; text-decoration: none;">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="cart-summary">
        <p>Total Bayar: <span class="total-price">Rp <?= number_format($total_bayar, 0, ',', '.'); ?></span></p>
    </div>

    <div class="cart-actions">
        <a href="index.php" class="btn-continue">Belanja Lagi</a>
        <a href="checkout.php" class="btn-checkout">Lanjut Checkout</a>
    </div>

    <?php else : ?>
    <div style="text-align: center; padding: 50px;">
        <p>Wah, keranjang lu masih kosong nih, Ral.</p>
        <br>
        <a href="index.php" class="btn-checkout">Mulai Belanja</a>
    </div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>