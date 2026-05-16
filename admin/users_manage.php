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

// Logika Search
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
    $query_str = "SELECT * FROM users WHERE 
                  username LIKE '%$search%' OR 
                  nama_lengkap LIKE '%$search%' OR 
                  email LIKE '%$search%' 
                  ORDER BY id_user DESC";
} else {
    $query_str = "SELECT * FROM users ORDER BY id_user DESC";
}

$query = mysqli_query($koneksi, $query_str);
?>

<div class="dashboard-wrapper">
    <main class="content-main">
        <section class="inventory-banner user-theme">
            <div class="banner-text">
                <h1>Data Pengguna</h1>
                <p>Kelola semua akun admin dan customer di sini, Ral.</p>
            </div>
            <div class="banner-search">
                <form action="" method="GET" class="search-form-modern">
                    <input type="text" name="search" placeholder="Cari username, nama, atau email..."
                        value="<?= $search; ?>">
                    <button type="submit">🔍</button>
                    <?php if($search != ""): ?>
                    <a href="users_manage.php" class="btn-reset">✖</a>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <section class="table-section">
            <div class="table-container-modern">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PROFIL</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if(mysqli_num_rows($query) > 0):
                            while($row = mysqli_fetch_assoc($query)) : 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td class="user-info-cell">
                                <div class="user-avatar"><?= substr($row['username'], 0, 1); ?></div>
                                <div class="user-text">
                                    <strong><?= $row['username']; ?></strong>
                                    <span><?= $row['nama_lengkap']; ?></span>
                                </div>
                            </td>
                            <td><?= $row['email']; ?></td>
                            <td>
                                <span class="role-badge <?= strtolower($row['role']); ?>">
                                    <?= $row['role']; ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="users_edit.php?id=<?= $row['id_user']; ?>" class="btn-edit">✏️ Edit</a>
                                    <a href="users.delete.php" class="btn-delete"
                                        onclick="return confirm('Hapus akun ini, Ral?')">🗑️ Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        else:
                        ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 50px;">
                                <p>Data pengguna tidak ditemukan...</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<?php include '../includes/footer.php'; ?>