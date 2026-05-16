<?php include 'includes/header.php'; ?>

<section class="contact-container">
    <h1>Hubungi Kami</h1>
    <form action="process_contact.php" method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn-send">Kirim Pesan</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>