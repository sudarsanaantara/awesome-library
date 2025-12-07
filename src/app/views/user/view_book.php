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

    <h2 class="page-title">Detail Buku</h2>
    <div class="detail-container">
        <div class="book-details">
            <?php $book_detail = $data['book']?>
            <h3><?= htmlspecialchars($book_detail['title']) ?></h3>
            <p><strong>Penulis:</strong> <?= htmlspecialchars($book_detail['author']) ?></p>
            <!----<p><strong>Kategori:</strong> <?= htmlspecialchars($book_detail['kategori']) ?></p>---->

            <h4>Deskripsi</h4>
            <p><?= htmlspecialchars($book_detail['description'] ?? "") ?></p>

            <form method="POST" action="<?= !$data['is_lended'] ? (BASEURL . '/user/book/lend/' . $book_detail['id']) : ""?>">
                <input type="hidden" name="action" value="pinjam_buku">
                <input type="hidden" name="book_id" value="<?= $book_detail['id'] ?>">

                <?php if (!$data['is_lended'] ): ?>
                    <button type="submit" class="btn-primary pinjam-btn" title="Pinjam buku ini">Pinjam</button>
                <?php else: ?>
                    <a href="<?= $book_detail["book_link"] ?>" class="btn-primary">Baca</button>
                <?php endif; ?>
                <a href="<?= BASEURL ?>/user/dashboard/" class="btn-cancel">Kembali</a>
            </form>
        </div>
    </div>
</div>