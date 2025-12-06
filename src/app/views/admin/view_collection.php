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
            <tr>
                <td>1</td>
                <td>Pemrograman Web</td>
                <td>Teknologi</td>
                <td>
                    <button class="btn-action edit-btn" title="Edit"> Edit</button>
                    <button class="btn-action delete-btn">Hapus</button>
                </td>
            </tr>
        </table>
    </div>
</div>