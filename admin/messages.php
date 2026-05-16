<?php 
include '../config/database.php';
/** @var mysqli $koneksi */
include '../includes/header.php';
?>
<section class="admin-table-container">
    <h1>Pesan Masuk</h1>
    <?php 
    $q = mysqli_query($koneksi, "SELECT * FROM contacts");
    while($row = mysqli_fetch_assoc($q)): 
    ?>
    <div style="border: 1px solid #ccc; margin-bottom: 10px; padding: 10px;">
        <p><strong>Dari:</strong> <?= $row['nama']; ?> (<?= $row['email']; ?>)</p>
        <p><strong>Subjek:</strong> <?= $row['subjek']; ?></p>
        <p><?= $row['pesan']; ?></p>
    </div>
    <?php endwhile; ?>
</section>