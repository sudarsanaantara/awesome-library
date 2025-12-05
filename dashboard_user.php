<?php
session_start();

// Simulasi data user dan data buku
$username = "User Eko"; 
$user_id = 123; 
$rekomendasi_buku = [
    ["judul" => "Filosofi Teras", "penulis" => "Henry Manampiring"],
    ["judul" => "Atomic Habits", "penulis" => "James Clear"],
    ["judul" => "Clean Code", "penulis" => "Robert C. Martin"],
];

$riwayat_pinjaman = [
    ["judul" => "The Great Gatsby", "status" => "Sudah Kembali"],
    ["judul" => "Pemrograman C++", "status" => "Aktif (Jatuh tempo 10/12/2025)"],
];

// Handle Logout
if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    session_unset();
    session_destroy();
    header("Location: login.php"); 
    exit();
}

$page = isset($_GET["page"]) ? $_GET["page"] : "home";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>

<div class="user-layout">
    <div class="header-bar">
        <h1>Perpustakaan Digital</h1>
        <div class="user-nav">
            <a href="dashboard_user.php?page=home" class="nav-link <?= ($page == 'home') ? 'active' : '' ?>">Home</a>
            <a href="dashboard_user.php?page=riwayat" class="nav-link <?= ($page == 'riwayat') ? 'active' : '' ?>">Riwayat Pinjaman</a>
            
            <a href="fitur_user.php?mode=profile" class="nav-link profile-icon-link <?= ($page == 'profile') ? 'active' : '' ?>" title="Profile User">
                👤
                </a>

            <a href="dashboard_user.php?action=logout" class="logout-link">Logout</a>
        </div>
    </div>

    <div class="content-area">
        <?php if ($page == "home"): ?>
            <div class="search-section">
                <h2>Cari Koleksi Buku</h2>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Masukkan judul, penulis, atau kategori buku...">
                    <button onclick="performSearch()">Cari</button>
                </div>
            </div>

            <div class="recommendation-section">
                <h3>Rekomendasi Buku Terbaru</h3>
                <div class="book-list">
                    <?php $i = 1; ?>
                    <?php foreach ($rekomendasi_buku as $buku): ?>
                        <div class="book-card">
                            <h4><?= htmlspecialchars($buku['judul']) ?></h4>
                            <p>Penulis: <?= htmlspecialchars($buku['penulis']) ?></p>
                            <?php $book_id = $i++; ?>
                            <a href="fitur_user.php?mode=book_detail&id=<?= $book_id ?>" class="btn-primary">Lihat Detail</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php elseif ($page == "riwayat"): ?>
            <h2 class="page-title">Riwayat Pinjaman</h2>
            
            <div class="history-table">
                <h4>Daftar Pinjaman</h4>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($riwayat_pinjaman as $item): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= htmlspecialchars($item['judul']) ?></td>
                                <td><?= htmlspecialchars($item['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif ($page == "profile"): ?>
            <h2 class="page-title">Profile User</h2>
            <div class="profile-info">
                <h4>Informasi Pengguna</h4>
                <p>Nama: <strong><?= htmlspecialchars($username) ?></strong></p>
                <p>ID: <?= htmlspecialchars($user_id) ?></p>
                <p>Status Akun: Aktif</p>
                </div>
        
        <?php else: ?>
            <p>Halaman tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>