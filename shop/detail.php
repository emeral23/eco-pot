<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product = '$id'");
$product = mysqli_fetch_assoc($query);
?>

<section class="detail-container">
    <div class="detail-flex">
        <div class="detail-img">
            <img src="../assets/uploads/products/<?= $product['gambar']; ?>" width="100%">
        </div>
        <div class="detail-info">
            <h1><?= $product['nama_produk']; ?></h1>
            <p class="price">Rp <?= number_format($product['harga'], 0, ',', '.'); ?></p>
            <p class="stock">Stok tersedia: <?= $product['stok']; ?></p>
            <hr>
            <p class="desc"><?= $product['deskripsi']; ?></p>

            <form action="cart.php" method="POST">
                <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>">
                <input type="number" name="qty" value="1" min="1" max="<?= $product['stok']; ?>">
                <button type="submit" name="add_to_cart" class="btn-cart">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>