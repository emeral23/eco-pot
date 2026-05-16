<?php 
include '../config/database.php';
/** @var mysqli $koneksi */ // Tambahin ini biar VS Code paham
include '../includes/header.php';

// Ambil data dari tabel site_settings (atau bikin query update)
if(isset($_POST['update_about'])) {
    $visi = mysqli_real_escape_string($koneksi, $_POST['visi']);
    $misi = mysqli_real_escape_string($koneksi, $_POST['misi']);
    
    // Asumsi lu punya tabel site_settings
    $query = mysqli_query($koneksi, "UPDATE site_settings SET content_visi='$visi', content_misi='$misi' WHERE id=1");
    if($query) {
        echo "<script>alert('Konten About berhasil diupdate!');</script>";
    }
}
?>

<section class="admin-form">
    <h1>Kelola Konten About</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label>Visi Perusahaan</label>
            <textarea name="visi" rows="4" required>Pelopor pot organik...</textarea>
        </div>
        <div class="form-group">
            <label>Misi Perusahaan (Gunakan tanda koma untuk tiap poin)</label>
            <textarea name="misi" rows="6" required>Produksi limbah, Edukasi masyarakat...</textarea>
        </div>
        <button type="submit" name="update_about" class="btn-save">Simpan Perubahan</button>
    </form>
</section>

<?php include '../includes/footer.php'; ?>