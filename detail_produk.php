<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "eco_pot");

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// QUERY YANG SUDAH DIPERBAIKI:
// Nama tabel diganti jadi 'products'
// Nama kolom ID diganti jadi 'id_product'
$query = mysqli_query($conn, "SELECT * FROM products WHERE id_product = '$id'");
$p = mysqli_fetch_array($query);

// Cek data
if (!$p) {
    echo "Produk tidak ditemukan!";
    exit;
}
?>

<?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
<div class="alert-success">
    Mantap Ral! Produk berhasil masuk keranjang.
</div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail - <?php echo $p['nama_produk']; ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <section class="product-detail-section">
        <div class="detail-container">
            <!-- Bagian Kiri: Gambar Produk -->
            <div class="detail-image">
                <!-- PHP manggil file foto dari folder assets/img/ -->
                <img src="assets/img/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama_produk']; ?>">
            </div>

            <!-- Bagian Kanan: Info Produk -->
            <div class="detail-info">
                <nav class="breadcrumb">
                    <a href="index.php">Home</a> / <a href="shop.php">Shop</a>
                </nav>

                <h1><?php echo $p['nama_produk']; ?></h1>

                <div class="price-box">
                    <span class="price-amount">Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></span>
                </div>

                <p class="product-description">
                    <?php echo $p['deskripsi']; ?>
                </p>

                <div class="action-buttons" style="margin-top: 30px;">
                    <a href="proses_keranjang.php?id=<?php echo $p['id_product']; ?>" class="btn-buy-now">
                        Tambah ke Keranjang
                    </a>
                    <a href="index.php" class="btn-back-home">
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>

</html>