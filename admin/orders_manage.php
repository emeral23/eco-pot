<?php 
include '../config/database.php';
/** @var mysqli $koneksi */
include '../includes/header.php';
?>

<section class="admin-table-container">
    <h1>Daftar Pesanan Masuk</h1>
    <table border="1" width="100%">
        <tr>
            <th>ID Order</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $q = mysqli_query($koneksi, "SELECT * FROM orders");
        while($row = mysqli_fetch_assoc($q)): 
        ?>
        <tr>
            <td>#<?= $row['id_order']; ?></td>
            <td>Rp <?= number_format($row['total_harga']); ?></td>
            <td><?= $row['status_pesanan']; ?></td>
            <td><a href="#">Update Status</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</section>