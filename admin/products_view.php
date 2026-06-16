<?php 
ob_start();
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php'; 

// Proteksi Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// Query ambil data produk
$query = mysqli_query($koneksi, "SELECT * FROM products ORDER BY id_product DESC");
?>

<div class="dashboard-wrapper">

    <main class="content-main">
        <section class="inventory-banner">
            <div class="banner-text">
                <h1>Inventory Produk</h1>
                <p>Kelola semua stok barang dan katalog produk di sini.</p>
            </div>
            <div class="banner-action">
                <a href="products_add.php" class="btn-tambah-modern">
                    <span class="icon">+</span> Tambah Produk Baru
                </a>
            </div>
        </section>

        <section class="table-section">
            <div class="table-container-modern">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>GAMBAR</th>
                            <th>NAMA PRODUK</th>
                            <th>HARGA</th>
                            <th>STOK</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = mysqli_fetch_assoc($query)) : 
                            $path_gambar = "../assets/img/" . $row['gambar'];
                            if (empty($row['gambar']) || !file_exists($path_gambar)) {
                                $path_gambar = "../assets/img/no-image.png";
                            }
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <div class="product-img-frame">
                                    <img src="<?= $path_gambar; ?>" alt="produk">
                                </div>
                            </td>
                            <td class="product-name-cell">
                                <strong><?= $row['nama_produk']; ?></strong>
                                <span>ID: #<?= $row['id_product']; ?></span>
                            </td>
                            <td class="price-cell">
                                Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                            </td>
                            <td>
                                <span class="stock-badge <?= ($row['stok'] < 10) ? 'low' : ''; ?>">
                                    <?= $row['stok']; ?> unit
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="products_edit.php?id=<?= $row['id_product']; ?>" class="btn-edit">✏️
                                        Edit</a>
                                    <a href="products_delete.php?id=<?= $row['id_product']; ?>" class="btn-delete"
                                        onclick="return confirm('Yakin mau hapus data ini?')">🗑️ Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<?php 
include '../includes/footer.php'; 
ob_end_flush();
?>