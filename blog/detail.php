<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php'; 

// Ambil slug dari URL
$slug = $_GET['slug'];
$query = mysqli_query($koneksi, "SELECT * FROM posts WHERE slug = '$slug'");
$post = mysqli_fetch_assoc($query);

if(!$post) {
    echo "<script>alert('Konten tidak ditemukan!'); window.location='index.php';</script>";
}
?>

<section class="blog-detail">
    <div class="breadcrumb">
        <a href="index.php">Blog</a> &raquo; <?= ucfirst($post['tipe']); ?>
    </div>

    <header class="post-header">
        <h1><?= $post['judul']; ?></h1>
        <p class="meta">Diposting pada: <?= date('d M Y', strtotime($post['created_at'])); ?> | Kategori:
            <strong><?= ucfirst($post['tipe']); ?></strong>
        </p>
    </header>

    <div class="post-image">
        <img src="../assets/uploads/blog/<?= $post['gambar']; ?>" width="100%">
    </div>

    <div class="post-content">
        <?= nl2br($post['konten']); // nl2br biar enter di database jadi baris baru di HTML ?>
    </div>

    <div class="post-footer">
        <a href="index.php" class="btn-back">Kembali ke Blog</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>