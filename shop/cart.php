<?php
session_start();
include '../config/database.php';
include '../includes/header.php';

// Logic untuk update jumlah produk di session saat tombol counter di bawah diklik
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    $id_produk = $_POST['product_id'];
    $jumlah_baru = intval($_POST['jumlah_produk']);
    
    if (isset($_SESSION['cart'][$id_produk]) && $jumlah_baru > 0) {
        $_SESSION['cart'][$id_produk]['jumlah'] = $jumlah_baru;
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
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
                $total_barang = 0;
                
                foreach ($_SESSION['cart'] as $id => $item) : 
                    $subtotal = $item['harga'] * $item['jumlah'];
                    $total_bayar += $subtotal;
                    $total_barang += $item['jumlah'];
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

        <div class="checkout-wrapper">
            <span class="total-items-count">(<?= $total_barang; ?> Produk)</span>

            <?php 
            // Mengambil ID produk pertama dari keranjang untuk di-handle counter bawah
            // Jika keranjang lu bisa muat banyak produk berbeda, counter ini otomatis mengontrol produk pertama
            reset($_SESSION['cart']);
            $first_id = key($_SESSION['cart']);
            $first_item = $_SESSION['cart'][$first_id];
            ?>

            <form action="" method="POST" class="form-qty" id="form-counter-bawah">
                <input type="hidden" name="product_id" value="<?= $first_id; ?>">
                <input type="hidden" name="update_cart" value="1">

                <div class="quantity-counter">
                    <button type="button" class="btn-qty" onclick="kurangQtyBawah()">-</button>
                    <input type="number" name="jumlah_produk" value="<?= $first_item['jumlah']; ?>" min="1" max="100"
                        id="qty-bawah" class="input-qty" readonly>
                    <button type="button" class="btn-qty" onclick="tambahQtyBawah()">+</button>
                </div>
            </form>

            <a href="checkout.php" class="btn-checkout">Lanjut Checkout</a>
        </div>
    </div>

    <?php else : ?>
    <div style="text-align: center; padding: 50px;">
        <p>Wah, keranjang lu masih kosong nih, Ral.</p>
        <br>
        <a href="index.php" class="btn-checkout">Mulai Belanja</a>
    </div>
    <?php endif; ?>
</div>

<script>
function kurangQtyBawah() {
    let input = document.getElementById('qty-bawah');
    let value = parseInt(input.value);
    if (value > 1) {
        input.value = value - 1;
        document.getElementById('form-counter-bawah').submit();
    }
}

function tambahQtyBawah() {
    let input = document.getElementById('qty-bawah');
    let value = parseInt(input.value);
    if (value < 100) {
        input.value = value + 1;
        document.getElementById('form-counter-bawah').submit();
    }
}
</script>

<?php include '../includes/footer.php'; ?>