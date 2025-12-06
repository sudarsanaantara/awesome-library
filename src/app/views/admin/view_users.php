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
        <h2 class="page-title">Pengguna</h2>

        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>eko_1999</td>
                <td>User</td>
                <td>
                    <button class="btn-action detail-btn">Detail</button>
                    <button class="btn-action delete-btn">Hapus</button>
                </td>
            </tr>
        </table>
    </div>
</div>