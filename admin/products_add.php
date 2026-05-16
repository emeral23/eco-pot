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

// Logika Simpan Produk
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    // Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../assets/img/" . $gambar;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO products (nama_produk, harga, stok, deskripsi, gambar) 
                  VALUES ('$nama', '$harga', '$stok', '$deskripsi', '$gambar')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: products_view.php?status=success");
        }
    }
}
?>

<div class="dashboard-wrapper">
    <main class="content-main">
        <section class="form-container-modern">
            <div class="form-header">
                <a href="products_view.php" class="btn-back">⬅️ Kembali</a>
                <h2>Tambah Produk Baru</h2>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="modern-form">
                <div class="form-grid">
                    <div class="form-inputs">
                        <div class="input-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" placeholder="Misal: Eco-Pot Semai" required>
                        </div>

                        <div class="input-row">
                            <div class="input-group">
                                <label>Harga (Rp)</label>
                                <input type="number" name="harga" placeholder="25000" required>
                            </div>
                            <div class="input-group">
                                <label>Stok Awal</label>
                                <input type="number" name="stok" placeholder="10" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Deskripsi Produk</label>
                            <textarea name="deskripsi" rows="5" placeholder="Jelaskan keunggulan produk ini..."
                                required></textarea>
                        </div>
                    </div>

                    <div class="form-upload">
                        <label>Foto Produk</label>
                        <div class="image-preview-box" id="preview-box">
                            <img src="../assets/img/no-image.png" id="img-output">
                            <div class="upload-overlay">
                                <span>Klik untuk ganti foto</span>
                            </div>
                            <input type="file" name="gambar" accept="image/*" id="image-input" required>
                        </div>
                        <p class="upload-note">Format: JPG, PNG, JPEG. Maks 2MB.</p>

                        <button type="submit" name="simpan" class="btn-submit-primary">🚀 Simpan Produk</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>

<script>
// Live Preview Gambar
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