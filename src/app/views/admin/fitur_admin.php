<?php
// --- DATA SIMULASI ---
$books = [
    1 => ['id' => 1, 'judul' => 'Pemrograman Web Dasar', 'penulis' => 'Ria Sari', 'kategori' => 'Teknologi'],
    2 => ['id' => 2, 'judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'kategori' => 'Filsafat'],
    3 => ['id' => 3, 'judul' => 'Resep Masakan Nusantara', 'penulis' => 'Chef Budi', 'kategori' => 'Memasak'],
];

$users = [
    101 => ['id' => 101, 'username' => 'admin_utama', 'role' => 'Admin', 'email' => 'admin@mail.com', 'status' => 'Aktif'],
    102 => ['id' => 102, 'username' => 'eko_1999', 'role' => 'User', 'email' => 'eko@mail.com', 'status' => 'Aktif'],
    103 => ['id' => 103, 'username' => 'budi_anggota', 'role' => 'User', 'email' => 'budi@mail.com', 'status' => 'Tidak Aktif'],
];

$message = "";
$tab = $_GET['tab'] ?? 'books'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['user_id'] ?? $_POST['book_id'] ?? 0);

    if ($tab === 'books' && ($action === 'tambah' || $action === 'edit')) {
        $judul = $_POST['judul'] ?? '';
        $penulis = $_POST['penulis'] ?? '';
        $kategori = $_POST['kategori'] ?? '';
        if ($action === 'tambah') {
            $new_id = max(array_keys($books)) + 1;
            $books[$new_id] = ['id' => $new_id, 'judul' => $judul, 'penulis' => $penulis, 'kategori' => $kategori];
            $message = "Buku '$judul' berhasil ditambahkan!";
        } elseif ($action === 'edit' && isset($books[$id])) {
            $books[$id] = ['id' => $id, 'judul' => $judul, 'penulis' => $penulis, 'kategori' => $kategori];
            $message = "Buku '$judul' berhasil diupdate!";
        }
    } 
    
    elseif (($tab === 'users' || $tab === 'profile') && $action === 'update_user') {
        $username_new = $_POST['username'] ?? '';
        $email_new = $_POST['email'] ?? '';
        $password_new = $_POST['password'] ?? '';
        if (isset($users[$id])) {
            $users[$id]['username'] = $username_new;
            $users[$id]['email'] = $email_new;
            if (!empty($password_new)) {
            }
            $message = "Profil pengguna '$username_new' berhasil diperbarui!";
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'hapus') {
    $id = (int)$_GET['id'];
    
    if ($tab === 'books' && isset($books[$id])) {
        $judul_hapus = $books[$id]['judul'];
        unset($books[$id]);
        $message = "Buku '$judul_hapus' berhasil dihapus!";
        header('Location: fitur_admin.php?tab=books');
        exit();
    } elseif ($tab === 'users' && isset($users[$id])) {
        $username_hapus = $users[$id]['username'];
        unset($users[$id]);
        $message = "Pengguna '$username_hapus' berhasil dihapus!";
        header('Location: fitur_admin.php?tab=users');
        exit();
    }
}

$edit_id = ($tab === 'books' && isset($_GET['edit'])) ? (int)$_GET['edit'] : 0;
$book_data = ($tab === 'books' && isset($books[$edit_id])) ? $books[$edit_id] : null;
$tambah_mode = ($tab === 'books' && isset($_GET['tambah']));

$edit_user_id = ($tab === 'users' && isset($_GET['edit'])) ? (int)$_GET['edit'] : 0;
$user_data_edit = ($tab === 'users' && isset($users[$edit_user_id])) ? $users[$edit_user_id] : null;

$detail_id = ($tab === 'users' && isset($_GET['detail'])) ? (int)$_GET['detail'] : 0;
$user_data_detail = ($tab === 'users' && isset($users[$detail_id])) ? $users[$detail_id] : null;

// Khusus Admin Profile (ID Admin  simulasikan 101)
$admin_id = 101;
$admin_data = $users[$admin_id] ?? ['id' => 101, 'username' => 'Admin', 'email' => 'admin@mail.com']; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Admin - <?= ucfirst($tab) ?></title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="sidebar">
    <h2>Library Admin</h2>
    <a href="dashboard_admin.php?page=home" class="nav-item">Dashboard</a>
    <a href="fitur_admin.php?tab=books" class="nav-item <?= ($tab == 'books') ? 'active' : '' ?>">Koleksi Buku</a>
    <a href="fitur_admin.php?tab=users" class="nav-item <?= ($tab == 'users') ? 'active' : '' ?>">Pengguna</a>
    <a href="dashboard_admin.php?action=logout" class="logout-btn">Logout</a>
</div>

<div class="content">
    
    <div class="user-profile-widget">
        <a href="fitur_admin.php?tab=profile" class="profile-btn <?= ($tab == 'profile') ? 'active' : '' ?>" title="Profile Admin">
            <span class="profile-icon">👤</span> 
        </a>
    </div>
    
    <div class="content-wrapper">
        <h2 class="page-title"><?= ($tab == 'books') ? 'Koleksi Buku' : (($tab == 'users') ? 'Manajemen Pengguna' : 'Profile Admin') ?></h2>
        
        <?php if ($message): ?>
            <div class="message-box success"><?= $message ?></div>
        <?php endif; ?>
        
        <?php if ($tab === 'books'): ?>
            
            <?php if ($edit_id > 0 || $tambah_mode): ?>
                <div class="form-card">
                    <h3><?= ($edit_id > 0) ? 'Edit Buku' : 'Tambah Buku Baru' ?></h3>
                    <form method="POST" action="fitur_admin.php?tab=books" onsubmit="return validateBookForm()">
                        <input type="hidden" name="action" value="<?= ($edit_id > 0) ? 'edit' : 'tambah' ?>">
                        <input type="hidden" name="book_id" value="<?= $edit_id ?>">
                        <div class="form-group"><label for="judul">Judul Buku</label><input type="text" name="judul" id="judul" value="<?= $book_data['judul'] ?? '' ?>" required></div>
                        <div class="form-group"><label for="penulis">Penulis</label><input type="text" name="penulis" id="penulis" value="<?= $book_data['penulis'] ?? '' ?>" required></div>
                        <div class="form-group"><label for="kategori">Kategori</label><input type="text" name="kategori" id="kategori" value="<?= $book_data['kategori'] ?? '' ?>" required></div>
                        <button type="submit" class="btn-submit"><?= ($edit_id > 0) ? 'Simpan Perubahan' : 'Tambah Buku' ?></button>
                        <a href="fitur_admin.php?tab=books" class="btn-cancel">Batal</a>
                    </form>
                </div>
            <?php else: ?>
                <a href="fitur_admin.php?tab=books&tambah=1" class="btn-tambah">+ Tambah Buku</a>
                <table>
                    <thead><tr><th>No</th><th>Judul Buku</th><th>Penulis</th><th>Kategori</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php $no = 1; foreach ($books as $book): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td class="text-left"><?= htmlspecialchars($book['judul']) ?></td>
                                <td class="text-left"><?= htmlspecialchars($book['penulis']) ?></td>
                                <td class="text-center"><?= htmlspecialchars($book['kategori']) ?></td>
                                <td>
                                    <a href="fitur_admin.php?tab=books&edit=<?= $book['id'] ?>" class="btn-action edit-btn" title="Edit">✏️ Edit</a>
                                    <a href="fitur_admin.php?tab=books&action=hapus&id=<?= $book['id'] ?>" class="btn-action delete-btn" onclick="return confirm('Hapus buku <?= htmlspecialchars($book['judul']) ?>?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        <?php elseif ($tab === 'users'): ?>
            
            <?php if ($detail_id > 0): ?>
                <div class="form-card">
                    <h3>Detail Pengguna: <?= htmlspecialchars($user_data_detail['username'] ?? '') ?></h3>
                    <div class="profile-detail">
                        <p><strong>Role:</strong> <?= htmlspecialchars($user_data_detail['role'] ?? '') ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user_data_detail['email'] ?? '') ?></p>
                        <p><strong>Status:</strong> <?= htmlspecialchars($user_data_detail['status'] ?? '') ?></p>
                    </div>
                    <a href="fitur_admin.php?tab=users" class="btn-cancel">Kembali ke Daftar</a>
                </div>

            <?php elseif ($edit_user_id > 0): ?>
                <div class="form-card">
                    <h3>Edit Pengguna: <?= htmlspecialchars($user_data_edit['username'] ?? '') ?></h3>
                    <form method="POST" action="fitur_admin.php?tab=users" onsubmit="return validateUserForm()">
                        <input type="hidden" name="action" value="update_user">
                        <input type="hidden" name="user_id" value="<?= $edit_user_id ?>">
                        <div class="form-group"><label for="username">Username</label><input type="text" name="username" id="username" value="<?= $user_data_edit['username'] ?? '' ?>" required></div>
                        <div class="form-group"><label for="email">Email</label><input type="email" name="email" id="email" value="<?= $user_data_edit['email'] ?? '' ?>" required></div>
                        <div class="form-group"><label for="password">Ganti Password</label><input type="password" name="password" id="password" placeholder="Kosongkan jika tidak ingin ganti"></div>
                        <button type="submit" class="btn-submit">Simpan Perubahan</button>
                        <a href="fitur_admin.php?tab=users" class="btn-cancel">Batal</a>
                    </form>
                </div>

            <?php else: ?>
                <table>
                    <thead><tr><th>No</th><th>Username</th><th>Role</th><th>Email</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php $no = 1; foreach ($users as $user): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td class="text-left"><?= htmlspecialchars($user['username']) ?></td>
                                <td class="text-center"><?= htmlspecialchars($user['role']) ?></td>
                                <td class="text-left"><?= htmlspecialchars($user['email']) ?></td>
                                <td>
                                    <a href="fitur_admin.php?tab=users&detail=<?= $user['id'] ?>" class="btn-action detail-btn">Detail</a>
                                    <a href="fitur_admin.php?tab=users&edit=<?= $user['id'] ?>" class="btn-action edit-btn">✏️ Edit</a>
                                    <a href="fitur_admin.php?tab=users&action=hapus&id=<?= $user['id'] ?>" class="btn-action delete-btn" onclick="return confirm('Hapus pengguna <?= htmlspecialchars($user['username']) ?>?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        <?php elseif ($tab === 'profile'): ?>
            <div class="form-card">
                <h3>Edit Profil Saya</h3>
                <form method="POST" action="fitur_admin.php?tab=profile" onsubmit="return validateAdminForm()">
                    <input type="hidden" name="action" value="update_user">
                    <input type="hidden" name="user_id" value="<?= $admin_id ?>">
                    
                    <div class="form-group"><label for="username_admin">Username</label><input type="text" name="username" id="username_admin" value="<?= $admin_data['username'] ?? '' ?>" required></div>
                    <div class="form-group"><label for="email_admin">Email</label><input type="email" name="email" id="email_admin" value="<?= $admin_data['email'] ?? '' ?>" required></div>
                    <div class="form-group"><label for="password_admin">Ganti Password</label><input type="password" name="password" id="password_admin" placeholder="Kosongkan jika tidak ingin ganti"></div>
                    
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="dashboard_admin.php?page=home" class="btn-cancel">Batal</a>
                </form>
            </div>
            
        <?php endif; ?>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>