<?php 
include '../config/database.php';
/** @var mysqli $koneksi */
include '../includes/header.php';

// Ambil ID kategori dari URL
$id_cat = $_GET['id'];

// Ambil nama kategori buat judul halaman
$cat_query = mysqli_query($koneksi, "SELECT nama_kategori FROM categories WHERE id_category = '$id_cat'");
$cat_data = mysqli_fetch_assoc($cat_query);
?>

<section class="category-container">
    <h1>Kategori: <?= $cat_data['nama_kategori']; ?></h1>

    <div class="product-grid">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM products WHERE id_category = '$id_cat'");
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) :
        ?>
        <div class="product-card">
            <img src="../assets/uploads/products/<?= $row['gambar']; ?>" alt="<?= $row['nama_produk']; ?>">
            <h3><?= $row['nama_produk']; ?></h3>
            <p class="price">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
            <a href="detail.php?id=<?= $row['id_product']; ?>" class="btn-detail">Lihat Detail</a>
        </div>
        <?php 
            endwhile; 
        } else {
            echo "<p>Belum ada produk di kategori ini, Ral.</p>";
        }
        ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>