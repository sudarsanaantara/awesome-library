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
                
                    <form method="POST" action="" class="search-box">
                        <input type="text" id="information" name="information" placeholder="Masukkan judul, penulis, atau kategori buku...">
                        <button type="submit" class="btn-submit">Cari</button>
                    </form>
                
            </div>

            <div class="recommendation-section">
                <h3>Rekomendasi Buku</h3>
                <div class="book-list">
                    <?php foreach ($data['rekomendasi_buku'] as $buku): ?>
                        <div class="book-card">
                            <h4><?= htmlspecialchars($buku['title']) ?></h4>
                            <p>Penulis: <?= htmlspecialchars($buku['author']) ?></p>
                            <a href="<?= BASEURL ?>/user/book/<?= $buku['id'] ?>" class="btn-primary">Lihat Detail</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </div>
</div>