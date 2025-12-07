<div class="user-layout">
    <div class="header-bar">
        <h1>Perpustakaan Digital</h1>
        <div class="user-nav">
            <a href="<?= BASEURL ?>/user/" class="nav-link">Dashboard</a>
            <a href="<?= BASEURL ?>/user/history" class="nav-link active">Riwayat Pinjaman</a>
            <a href="<?= BASEURL ?>/user/profile" class="nav-link profile-icon-link" title="Profile User">
                👤
            </a>
            <a href="<?= BASEURL ?>/logout" class="logout-link">Logout</a>
        </div>
    </div>

    <div class="content-area">
        <h2 class="page-title">Riwayat Pinjaman</h2>

        <div class="history-table">
            <h4>Daftar Pinjaman</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data['history'] as $item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($item['book']['title']) ?></td>
                            <td><?= htmlspecialchars($item['lend_date']) ?></td>
                            <td><?= htmlspecialchars($item['expired_date']) ?></td>
                            <td><?= htmlspecialchars($item['is_expired'] ? "Kadaluwarsa" : "Aktif") ?></td>
                            <td><a href="<?= BASEURL . '/user/book/' . $item['book']['id']?>" class="btn-primary">Lihat</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>