<?php
/** @var mysqli $koneksi */
session_start();
include 'config/database.php';
include 'includes/header.php';

// Ambil data produk dari database
$query_produk = mysqli_query($koneksi, "SELECT * FROM products ORDER BY id_product DESC LIMIT 4");
?>

<section class="products-section" id="produk-terbaru">
    <div class="product-grid-modern">
        <?php while($row = mysqli_fetch_assoc($query_produk)) : ?>
        <div class="product-card">
            <div class="product-img-box">
                <img src="assets/img/<?= $row['gambar']; ?>" alt="<?= $row['nama_produk']; ?>">
            </div>

            <div class="product-info">
                <h3><?= $row['nama_produk']; ?></h3>
                <p>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>

                <div class="product-action">
                    <a href="detail_produk.php?id=<?= $row['id_product']; ?>" class="btn-detail-view">Detail</a>

                    <?php 
                    // Cek apakah yang login adalah admin
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : 
                    ?>
                    <!-- Menu khusus admin buat kelola produk -->
                    <a href="edit_produk.php?id=<?= $row['id_product']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus_produk.php?id=<?= $row['id_product']; ?>" class="btn-hapus"
                        onclick="return confirm('Yakin mau hapus produk ini?')">Hapus</a>
                    <?php else : ?>
                    <!-- Menu buat user biasa atau tamu -->
                    <a href="shop/tambah_keranjang.php?id=<?= $row['id_product']; ?>" class="btn-beli">Beli</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<style>
/* Style dipisah ke bawah sesuai request lu, Ral */
.btn-edit {
    background-color: #f39c12;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
}

.btn-hapus {
    background-color: #e74c3c;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
}

.product-action {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 15px;
}
</style>