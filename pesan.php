<?php
include 'config/database.php';
// Pastikan path include database lu udah bener ya Ral
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kirim Pesan - BriketKuy</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
    .pesan-section {
        padding-top: 100px;
        padding-bottom: 100px;
        background-color: #f8fafc;
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-pesan-container {
        background-color: #ffffff;
        padding-top: 40px;
        padding-bottom: 40px;
        padding-left: 40px;
        padding-right: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        max-width: 600px;
        width: 100%;
        border: 1px solid #e2e8f0;
    }

    .form-pesan-container h2 {
        color: #1e293b;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 8px;
        text-align: center;
    }

    .form-pesan-container p {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 30px;
        text-align: center;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .form-group label {
        color: #334155;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group textarea {
        padding-top: 12px;
        padding-bottom: 12px;
        padding-left: 16px;
        padding-right: 16px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 15px;
        color: #1e293b;
        outline: none;
        box-sizing: border-box;
        width: 100%;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #f97316;
    }

    .btn-kirim-pesan {
        background-color: #f97316;
        color: #ffffff;
        border: none;
        padding-top: 14px;
        padding-bottom: 14px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.2s ease;
    }

    .btn-kirim-pesan:hover {
        background-color: #ea580c;
    }

    .alert-sukses {
        background-color: #f0fdf4;
        color: #16a34a;
        border: 1px solid #bbf7d0;
        padding: 15px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
    }

    .btn-kembali-home {
        display: block;
        text-align: center;
        background-color: transparent;
        color: #64748b;
        border: 1px solid #cbd5e1;
        padding-top: 14px;
        padding-bottom: 14px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        margin-top: 12px;
        box-sizing: border-box;
        width: 100%;
        transition: all 0.2s ease;
    }

    .btn-kembali-home:hover {
        background-color: #f8fafc;
        color: #1e293b;
        border-color: #94a3b8;
    }
    </style>
</head>

<body>

    <section class="pesan-section">
        <div class="form-pesan-container">
            <h2>Kirim Pesan ke Admin</h2>
            <p>Ada pertanyaan atau kustomisasi order briket? Tulis di bawah, Ral!</p>

            <?php 
        // Notifikasi kalau pesan berhasil masuk ke database
        if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
            echo "<div class='alert-sukses'>Pesan lu berhasil dikirim ke database!</div>";
        }
        ?>

            <form action="pesan_proses.php" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" required placeholder="Masukkan nama lu">
                </div>

                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" required placeholder="nama@email.com">
                </div>

                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subjek" required placeholder="Contoh: Tanya Stok Briket">
                </div>

                <div class="form-group">
                    <label>Isi Pesan</label>
                    <textarea name="pesan" rows="5" required placeholder="Tulis pesan lengkap lu di sini..."></textarea>
                </div>

                <button type="submit" class="btn-kirim-pesan">Kirim Pesan</button>

                <a href="index.php" class="btn-kembali-home">Kembali ke Home</a>
            </form>
        </div>
    </section>

</body>

</html>