<div class="sidebar">
    <h2>Library Admin</h2>
    <a href="<?= BASEURL ?>/admin/dashboard" class="nav-item">Dashboard</a>
    <a href="<?= BASEURL ?>/admin/koleksi_buku" class="nav-item">Koleksi Buku</a>
    <a href="<?= BASEURL ?>/admin/pengguna" class="nav-item">Pengguna</a>
    <a href="<?= BASEURL ?>/logout" class="logout-btn">Logout</a>
</div>

<div class="content">

    <div class="user-profile-widget">
        <a href="<?= BASEURL ?>/admin/profile" class="profile-btn" title="Profil Admin">
            <span class="profile-icon">👤</span>
        </a>
    </div>

    <div class="content-wrapper">
        <h2 class="page-title"><?= $data['title'] ?></h2>

        <?php if ($data["message"] != ""): ?>
            <div class="message-box success"><?= $data['message'] ?></div>
        <?php endif; ?>
        <div class="form-card">
            <h3><?= $data['subtitle'] ?></h3>
            <form method="POST" action="" onsubmit="return validateBookForm()">
                <input type="hidden" name="action" value="tambah">
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" name="judul" id="judul" value="" required>
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" value="" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="book_category" required>
                        <?php foreach($data['kategori_buku'] as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                    <div class="form-group">
                    <label for="link_buku">Link Buku</label>
                    <input type="text" name="link_buku" id="link_buku" value="" required>
                </div>
                <button type="submit" class="btn-submit">Tambah Buku</button>
                <a href="<?= BASEURL ?>/admin/koleksi_buku" class="btn-cancel">Kembali</a>
            </form>
        </div>
    </div>
</div>