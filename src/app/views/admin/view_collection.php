<div class="sidebar">
    <h2>Library Admin</h2>
    <a href="<?= BASEURL ?>/admin/dashboard" class="nav-item">Dashboard</a>
    <a href="<?= BASEURL ?>/admin/koleksi_buku" class="nav-item">Koleksi Buku</a>
    <a href="<?= BASEURL ?>/admin/pengguna" class="nav-item">Pengguna</a>
    <a href="<?= BASEURL ?>/logout" class="logout-btn">Logout</a>
</div>

<div class="content">
    <div class="user-profile-widget">
        <a href="<?= BASEURL ?>/admin/profile" class="profile-btn" title="Akses Profil Admin">
            <span class="profile-icon">👤</span>
        </a>
    </div>

    <div class="content-wrapper">
        <h2 class="page-title">Koleksi Buku</h2>
        <a href="<?= BASEURL ?>/admin/tambah_buku" class="btn">+ Tambah Buku</a>

        <table>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php ;$i = 1;foreach($data['books'] as $book): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $book['title'] ?></td>
                <td><?= $data['kategori_buku'][$book['category_id']-1]["category_name"] ?></td>
                <td>
                    <!----<button class="btn-action edit-btn" title="Edit"> Edit</button>--->
                    <a href="<?= BASEURL ?>/admin/koleksi_buku/hapus/<?= $book['id'] ?>" class="btn-action delete-btn" onclick="return confirm('Hapus buku <?= htmlspecialchars($book['title']) ?>')">Hapus</button>
                </td>
                <?php $i++ ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>