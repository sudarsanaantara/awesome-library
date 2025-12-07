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
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach($data['users'] as $user): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['is_admin'] ? "Admin" : "User" ?></td>
                <td>
                    <?php if(!$user['is_admin']): ?>
                        <a href="<?= BASEURL ?>/admin/pengguna/hapus/<?= $user['id'] ?>" class="btn-action delete-btn" onclick="return confirm('Hapus dengan username <?= htmlspecialchars($user['username']) ?>')">Hapus</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>