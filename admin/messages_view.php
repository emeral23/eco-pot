<?php
include '../config/database.php';
/** @var mysqli $koneksi */

// Tarik data pesan dari yang paling baru masuk
$query = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Pesan Masuk</title>
    <style>
    .admin-container {
        padding-top: 40px;
        padding-bottom: 40px;
        padding-left: 30px;
        padding-right: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8fafc;
        min-height: 100vh;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .admin-header h1 {
        color: #1e293b;
        font-size: 28px;
        margin: 0;
    }

    .btn-back-dashboard {
        background-color: #64748b;
        color: #ffffff;
        text-decoration: none;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 16px;
        padding-right: 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        transition: background-color 0.2s;
    }

    .btn-back-dashboard:hover {
        background-color: #475569;
    }

    .table-responsive {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    .table-messages {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: 15px;
    }

    .table-messages th {
        background-color: #f1f5f9;
        color: #475569;
        font-weight: 600;
        padding-top: 16px;
        padding-bottom: 16px;
        padding-left: 20px;
        padding-right: 20px;
        border-bottom: 2px solid #e2e8f0;
    }

    .table-messages td {
        padding-top: 16px;
        padding-bottom: 16px;
        padding-left: 20px;
        padding-right: 20px;
        border-bottom: 1px solid #edf2f7;
        color: #334155;
        vertical-align: top;
    }

    .table-messages tr:hover {
        background-color: #f8fafc;
    }

    .badge-status {
        display: inline-block;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 8px;
        padding-right: 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .badge-unread {
        background-color: #fee2e2;
        color: #ef4444;
    }

    .text-muted {
        color: #94a3b8;
        font-size: 13px;
    }

    .pesan-text {
        white-space: pre-line;
        max-width: 400px;
        color: #515f72;
    }
    </style>
</head>

<body>

    <div class="admin-container">
        <div class="admin-header">
            <h1>Pesan Masuk Pembeli</h1>
            <a href="products_view.php" class="btn-back-dashboard">← Kelola Produk</a>
        </div>

        <div class="table-responsive">
            <table class="table-messages">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengirim</th>
                        <th>Subjek & Pesan</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td><strong><?= $no++; ?></strong></td>
                        <td>
                            <strong><?= htmlspecialchars($row['nama']); ?></strong><br>
                            <span class="text-muted"><?= htmlspecialchars($row['email']); ?></span>
                        </td>
                        <td>
                            <strong>Subjek: <?= htmlspecialchars($row['subjek']); ?></strong>
                            <p class="pesan-text"><?= htmlspecialchars($row['pesan']); ?></p>
                        </td>
                        <td>
                            <span class="text-muted"><?= date('d M Y, H:i', strtotime($row['created_at'])); ?></span>
                        </td>
                        <td>
                            <!-- Menyesuaikan enum status_baca bawaan database lu -->
                            <span class="badge-status badge-unread">
                                <?= str_replace('_', ' ', $row['status_baca']); ?>
                            </span>
                        </td>
                    </tr>
                    <?php 
                    }
                } else { 
                ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #94a3b8; padding: 40px;">
                            Belum ada pesan masuk dari pelanggan, Ral.
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>