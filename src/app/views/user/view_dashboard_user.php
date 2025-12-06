<?php

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
?>

<div class="user-layout">
    <div class="header-bar">
        <h1>Perpustakaan Digital</h1>
        <div class="user-nav">
            <a href="<?= BASEURL ?>/user/" class="nav-link active">Dashboard</a>
            <a href="<?= BASEURL ?>/user/history" class="nav-link">Riwayat Pinjaman</a>

            <a href="<?= BASEURL ?>/user/profile" class="nav-link profile-icon-link" title="Profile User">
                👤
            </a>

            <a href="<?= BASEURL ?>/logout" class="logout-link">Logout</a>
        </div>
    </div>

    <div class="content-area">
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
    </div>
</div>