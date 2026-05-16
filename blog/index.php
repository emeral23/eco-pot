<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php';
include '../includes/function.php'; // Kita pake fungsi limitText di sini
?>

<section class="blog-container">
    <h1>Edukasi & Tips Eco-Pot</h1>
    <p>Temukan tutorial menanam dan berita lingkungan terbaru di sini.</p>

    <div class="blog-grid">
        <?php
        // Ambil semua data dari tabel posts
        $query = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY created_at DESC");
        
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) :
        ?>
        <article class="blog-card">
            <div class="badge"><?= ucfirst($row['tipe']); ?></div>
            <img src="../assets/uploads/blog/<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>">
            <div class="blog-info">
                <h2><?= $row['judul']; ?></h2>
                <p><?= limitText($row['konten'], 120); ?></p>
                <a href="detail.php?slug=<?= $row['slug']; ?>" class="btn-read">Baca Selengkapnya</a>
            </div>
        </article>
        <?php 
            endwhile; 
        } else {
            echo "<p>Belum ada artikel atau tutorial nih, Ral.</p>";
        }
        ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>