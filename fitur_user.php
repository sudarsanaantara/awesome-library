<?php
session_start();

// --- DATA SIMULASI ---
$username = "User Eko"; 
$user_id = 102; 
$books = [
    1 => ['id' => 1, 'judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'kategori' => 'Filsafat', 'deskripsi' => 'Pengantar filsafat Stoa yang membantu mengelola emosi dan pikiran.', 'stok' => 5],
    2 => ['id' => 2, 'judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'kategori' => 'Pengembangan Diri', 'deskripsi' => 'Panduan praktis untuk membangun kebiasaan baik dan menghilangkan kebiasaan buruk.', 'stok' => 12],
    3 => ['id' => 3, 'judul' => 'Clean Code', 'penulis' => 'Robert C. Martin', 'kategori' => 'Teknologi', 'deskripsi' => 'Buku penting untuk setiap programmer yang ingin menulis kode yang bersih dan mudah dipelihara.', 'stok' => 0],
];

$user_data = [
    'id' => $user_id,
    'username' => $username,
    'email' => 'user_eko@mail.com',
    'alamat' => 'Jl. Mawar No. 5, Kota ABC'
];

$message = "";
$mode = $_GET['mode'] ?? 'profile'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'update_profile') {
        $username_new = $_POST['username'] ?? '';
        $email_new = $_POST['email'] ?? '';
        $alamat_new = $_POST['alamat'] ?? '';
        $password_new = $_POST['password'] ?? '';
        
        // Simulasi update data user_data
        $user_data['username'] = $username_new;
        $user_data['email'] = $email_new;
        $user_data['alamat'] = $alamat_new;
        
        $message = "Profil Anda berhasil diperbarui!";
        header('Location: fitur_user.php?mode=profile&msg=' . urlencode($message));
        exit();
    }
    
    if ($action === 'pinjam_buku') {
        $book_id = (int)$_POST['book_id'];
        $buku_dipinjam = $books[$book_id]['judul'] ?? 'Buku Tidak Dikenal';
        $message = "Anda berhasil meminjam buku '$buku_dipinjam'.";
        header('Location: dashboard_user.php?page=riwayat&msg=' . urlencode($message));
        exit();
    }
}

$book_detail = null;
if ($mode === 'book_detail') {
    $book_id = (int)$_GET['id'] ?? 0;
    $book_detail = $books[$book_id] ?? null;
    if (!$book_detail) {
        $message = "Buku tidak ditemukan!";
    }
}

if (isset($_GET['msg'])) {
    $message = htmlspecialchars($_GET['msg']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur User - Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="user-layout">
    <div class="header-bar">
        <h1>Perpustakaan Digital</h1>
        <div class="user-nav">
            <a href="dashboard_user.php?page=home" class="nav-link">Home</a>
            <a href="dashboard_user.php?page=riwayat" class="nav-link">Riwayat Pinjaman</a>
            <a href="fitur_user.php?mode=profile" class="nav-link profile-icon-link active" title="Profile User">👤</a>
            <a href="dashboard_user.php?action=logout" class="logout-link">Logout</a>
        </div>
    </div>

    <div class="content-area">
        <?php if ($message): ?>
            <div class="message-box success"><?= $message ?></div>
        <?php endif; ?>

        <?php if ($mode === 'profile'): ?>
            <h2 class="page-title">Edit Profile</h2>
            <div class="form-card profile-form-card">
                <h3>Informasi Pribadi</h3>
                <form method="POST" action="fitur_user.php" onsubmit="return validateProfileForm()">
                    <input type="hidden" name="action" value="update_profile">

                    <div class="form-group"><label for="username">Username</label><input type="text" name="username" id="username" value="<?= $user_data['username'] ?>" required></div>
                    <div class="form-group"><label for="email">Email</label><input type="email" name="email" id="email" value="<?= $user_data['email'] ?>" required></div>
                    <div class="form-group"><label for="alamat">Alamat</label><input type="text" name="alamat" id="alamat" value="<?= $user_data['alamat'] ?>" required></div>
                    <div class="form-group"><label for="password">Ganti Password</label><input type="password" name="password" id="password" placeholder="Kosongkan jika tidak ingin ganti"></div>
                    
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="dashboard_user.php?page=home" class="btn-cancel">Batal</a>
                </form>
            </div>
            
        <?php elseif ($mode === 'book_detail' && $book_detail): ?>
            <h2 class="page-title">Detail Buku</h2>
            <div class="detail-container">
                <div class="book-details">
                    <h3><?= htmlspecialchars($book_detail['judul']) ?></h3>
                    <p><strong>Penulis:</strong> <?= htmlspecialchars($book_detail['penulis']) ?></p>
                    <p><strong>Kategori:</strong> <?= htmlspecialchars($book_detail['kategori']) ?></p>
                    <p><strong>Stok Tersedia:</strong> <span class="stock-status <?= ($book_detail['stok'] > 0) ? 'in-stock' : 'out-of-stock' ?>"><?= $book_detail['stok'] ?></span></p>
                    
                    <h4>Deskripsi</h4>
                    <p><?= htmlspecialchars($book_detail['deskripsi']) ?></p>

                    <form method="POST" action="fitur_user.php">
                        <input type="hidden" name="action" value="pinjam_buku">
                        <input type="hidden" name="book_id" value="<?= $book_detail['id'] ?>">
                        
                        <?php if ($book_detail['stok'] > 0): ?>
                            <button type="submit" class="btn-primary pinjam-btn" title="Pinjam buku ini">+ Pinjam & Baca</button>
                        <?php else: ?>
                            <button type="button" class="btn-disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                        
                        <a href="dashboard_user.php?page=home" class="btn-cancel">Kembali</a>
                    </form>
                </div>
            </div>

        <?php else: ?>
            <h2 class="page-title">Buku Tidak Ditemukan</h2>
            <a href="dashboard_user.php?page=home" class="btn-cancel">Kembali ke Home</a>
        <?php endif; ?>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>