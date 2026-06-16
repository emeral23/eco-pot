<?php 
ob_start();
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php'; 

if (isset($_POST['simpan'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $tipe = $_POST['tipe'];
    $konten = mysqli_real_escape_string($koneksi, $_POST['konten']);
    
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../assets/img/" . $gambar;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO posts (judul, tipe, konten, gambar, created_at) 
                  VALUES ('$judul', '$tipe', '$konten', '$gambar', NOW())";
        if (mysqli_query($koneksi, $query)) {
            header("Location: blog_manage.php?status=success");
        }
    }
}
?>

<div class="dashboard-wrapper">
    <main class="content-main full-width">
        <section class="form-container-modern">
            <div class="form-header">
                <a href="blog_manage.php" class="btn-back">⬅️ Kembali</a>
                <h2>Tulis Artikel Baru</h2>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="modern-form">
                <div class="form-grid">
                    <div class="form-inputs">
                        <div class="input-group">
                            <label>Judul Artikel</label>
                            <input type="text" name="judul" placeholder="Masukkan judul yang menarik..." required>
                        </div>
                        <div class="input-group">
                            <label>Tipe Konten</label>
                            <select name="tipe" required>
                                <option value="Blog">Blog</option>
                                <option value="Tutorial">Tutorial</option>
                                <option value="Edukasi">Edukasi</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Isi Konten</label>
                            <textarea name="konten" rows="10" placeholder="Tulis cerita lu di sini"
                                required></textarea>
                        </div>
                    </div>

                    <div class="form-upload">
                        <label>Thumbnail Artikel</label>
                        <div class="image-preview-box" id="preview-box">
                            <img src="../assets/img/no-image.png" id="img-output">
                            <input type="file" name="gambar" accept="image/*" id="image-input" required>
                        </div>
                        <button type="submit" name="simpan" class="btn-submit-primary">🚀 Publikasikan</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>

<script>
const imageInput = document.getElementById('image-input');
const imgOutput = document.getElementById('img-output');
imageInput.onchange = evt => {
    const [file] = imageInput.files;
    if (file) {
        imgOutput.src = URL.createObjectURL(file);
    }
}
</script>