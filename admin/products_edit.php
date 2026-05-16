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

// Ambil ID Produk dari URL
$id = $_GET['id'];
$get_data = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product = '$id'");
$data = mysqli_fetch_assoc($get_data);

// Logika Update Produk
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    $gambar_baru = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar_baru)) {
        // Jika upload gambar baru
        $path = "../assets/img/" . $gambar_baru;
        move_uploaded_file($tmp, $path);
        $query = "UPDATE products SET 
                  nama_produk='$nama', harga='$harga', stok='$stok', 
                  deskripsi='$deskripsi', gambar='$gambar_baru' 
                  WHERE id_product='$id'";
    } else {
        // Jika tetap pakai gambar lama
        $query = "UPDATE products SET 
                  nama_produk='$nama', harga='$harga', stok='$stok', 
                  deskripsi='$deskripsi' 
                  WHERE id_product='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        header("Location: products_view.php?status=updated");
    }
}
?>

<div class="dashboard-wrapper">
    <main class="content-main">
        <section class="form-container-modern">
            <div class="form-header">
                <a href="products_view.php" class="btn-back">⬅️ Batal</a>
                <h2>Edit Produk: <?= $data['nama_produk']; ?></h2>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="modern-form">
                <div class="form-grid">
                    <div class="form-inputs">
                        <div class="input-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" required>
                        </div>

                        <div class="input-row">
                            <div class="input-group">
                                <label>Harga (Rp)</label>
                                <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
                            </div>
                            <div class="input-group">
                                <label>Stok</label>
                                <input type="number" name="stok" value="<?= $data['stok']; ?>" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Deskripsi Produk</label>
                            <textarea name="deskripsi" rows="5" required><?= $data['deskripsi']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-upload">
                        <label>Foto Produk Saat Ini</label>
                        <div class="image-preview-box">
                            <?php 
                                $img = !empty($data['gambar']) ? $data['gambar'] : 'no-image.png';
                            ?>
                            <img src="../assets/img/<?= $img; ?>" id="img-output">
                            <div class="upload-overlay">
                                <span>Klik untuk ganti foto</span>
                            </div>
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