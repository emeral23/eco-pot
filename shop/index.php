<?php
session_start();
include '../config/database.php'; // Pastikan path database bener
include '../includes/header.php'; // Header biar navbar tetep ada
/** @var mysqli $koneksi */ // Biar gak error di IDE
?>

<!-- Panggil CSS khusus shop agar tampilan jadi grid rapi -->
<link rel="stylesheet" href="../assets/css/shop.css">

<div class="shop-page">
    <div class="shop-header">
        <h1>Katalog Produk Eco-Pot</h1>
    </div>

    <div class="products-container">
        <?php
        // Ambil data produk dari database
        $query_produk = mysqli_query($koneksi, "SELECT * FROM products ORDER BY id_product DESC");
        
        if (mysqli_num_rows($query_produk) > 0) {
            while ($row = mysqli_fetch_assoc($query_produk)) :
        ?>
        <div class="product-card">
            <div class="product-img-box">
                <!-- Pastikan folder assets/img lu isinya bener -->
                <img src="../assets/img/<?= $row['gambar']; ?>" alt="<?= $row['nama_produk']; ?>">
            </div>

            <div class="product-info">
                <h3><?= $row['nama_produk']; ?></h3>
                <div class="product-price">
                    Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                </div>

                <div class="product-action">
                    <!-- Tombol Detail -->
                    <a href="detail_produk.php?id=<?= $row['id_product']; ?>" class="btn-detail">Detail</a>

                    <!-- Tombol Beli: Langsung proses ke keranjang tanpa login -->
                    <a href="tambah_keranjang.php?id=<?= $row['id_product']; ?>" class="btn-add-cart">
                        Beli
                    </a>
                </div>
            </div>
        </div>
        <?php 
            endwhile;
        } else {
            echo "<p class='empty-msg'>Belum ada produk nih, Ral.</p>";
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>