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

// Query ambil data artikel/blog
$query = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY id_post DESC");
?>

<div class="dashboard-wrapper">
    <main class="content-main">
        <section class="inventory-banner article-theme">
            <div class="banner-text">
                <h1>Kelola Blog & Tutorial</h1>
                <p>Tulis konten edukasi dan update terbaru untuk pelanggan lu.</p>
            </div>
            <div class="banner-action">
                <a href="blog_add.php" class="btn-tambah-modern">
                    <span class="icon">+</span> Tulis Artikel Baru
                </a>
            </div>
        </section>

        <section class="table-section">
            <div class="table-container-modern">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>JUDUL ARTIKEL</th>
                            <th>TIPE/KATEGORI</th>
                            <th>TANGGAL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = mysqli_fetch_assoc($query)) : 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td class="product-name-cell">
                                <strong><?= $row['judul']; ?></strong>
                            </td>
                            <td>
                                <span class="type-badge"><?= $row['tipe']; ?></span>
                            </td>
                            <td><?= date('d M Y', strtotime($row['created_at'])); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="blog_edit.php?id=<?= $row['id_post']; ?>" class="btn-edit">✏️ Edit</a>
                                    <a href="blog_delete.php?id=<?= $row['id_post']; ?>" class="btn-delete"
                                        onclick="return confirm('Yakin artikel ini mau dihapus, Ral?')">🗑️ Hapus</a>
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