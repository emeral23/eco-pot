<?php 
ob_start();
include '../config/database.php'; 
/** @var mysqli $koneksi */ // Biar VS Code paham
include '../includes/header.php'; 

// 1. Ambil data lama buat ditampilin di form
$id = $_GET['id'];
$get_data = mysqli_query($koneksi, "SELECT * FROM posts WHERE id_post = '$id'");
$data = mysqli_fetch_assoc($get_data);

// 2. Logika Update (Punya lu udah bener, tinggal dirapiin dikit)
if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $tipe = $_POST['tipe'];
    $konten = mysqli_real_escape_string($koneksi, $_POST['konten']);
    $gambar_baru = $_FILES['gambar']['name'];

    if (!empty($gambar_baru)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/img/" . $gambar_baru);
        $query = "UPDATE posts SET judul='$judul', tipe='$tipe', konten='$konten', gambar='$gambar_baru' WHERE id_post='$id'";
    } else {
        $query = "UPDATE posts SET judul='$judul', tipe='$tipe', konten='$konten' WHERE id_post='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        header("Location: blog_manage.php?status=updated");
        exit();
    }
}
?>

<div class="dashboard-wrapper">
    <main class="content-main">
        <section class="form-container-modern">
            <div class="form-header">
                <a href="blog_manage.php" class="btn-back">⬅️ Batal</a>
                <h2>Edit Artikel: <?= $data['judul']; ?></h2>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="modern-form">
                <div class="form-grid">
                    <div class="form-inputs">
                        <div class="input-group">
                            <label>Judul Artikel</label>
                            <input type="text" name="judul" value="<?= $data['judul']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label>Tipe Konten</label>
                            <select name="tipe" required>
                                <option value="Blog" <?= $data['tipe'] == 'Blog' ? 'selected' : ''; ?>>Blog</option>
                                <option value="Tutorial" <?= $data['tipe'] == 'Tutorial' ? 'selected' : ''; ?>>Tutorial
                                </option>
                                <option value="Edukasi" <?= $data['tipe'] == 'Edukasi' ? 'selected' : ''; ?>>Edukasi
                                </option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Isi Konten</label>
                            <textarea name="konten" rows="10" required><?= $data['konten']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-upload">
                        <label>Thumbnail Saat Ini</label>
                        <div class="image-preview-box">
                            <img src="../assets/img/<?= $data['gambar']; ?>" id="img-output">
                            <div class="upload-overlay"><span>Klik untuk ganti foto</span></div>
                            <input type="file" name="gambar" accept="image/*" id="image-input">
                        </div>
                        <p class="upload-note">Kosongkan jika tidak ingin mengubah gambar.</p>
                        <button type="submit" name="update" class="btn-submit-primary">💾 Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>

<script>
// Preview gambar otomatis kalau diganti
const imageInput = document.getElementById('image-input');
const imgOutput = document.getElementById('img-output');
imageInput.onchange = evt => {
    const [file] = imageInput.files;
    if (file) {
        imgOutput.src = URL.createObjectURL(file);
    }
}
</script>

<?php include '../includes/footer.php'; ?>