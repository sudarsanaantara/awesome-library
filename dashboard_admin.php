<?php
session_start();

if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];

$page = isset($_GET["page"]) ? $_GET["page"] : "home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css?v=2.1"> 
</head>
<body>

<div class="sidebar">
    <h2>Library Admin</h2>
    <a href="dashboard_admin.php?page=home" class="nav-item">Dashboard</a>
    
    <a href="fitur_admin.php" class="nav-item">Koleksi Buku</a>
    
    <a href="dashboard_admin.php?page=pengguna" class="nav-item">Pengguna</a>
    <a href="dashboard_admin.php?action=logout" class="logout-btn">Logout</a>
</div>

<div class="content">
    <div class="user-profile-widget">
        <a href="fitur_admin.php?tab=profile" class="profile-btn" title="Akses Profil Admin">
            <span class="profile-icon">👤</span> 
        </a>
    </div>

    <div class="content-wrapper"> 

        <?php if ($page == "home"): ?>
            <h2 class="page-title">Dashboard Utama</h2>
            <div class="stats">
                <div class="card">
                    <p>User Aktif</p>
                    <h3>28</h3>
                </div>

                <div class="card">
                    <p>Total Buku</p>
                    <h3>134</h3>
                </div>

                <div class="card">
                    <p>Peminjaman Berjalan</p>
                    <h3>9</h3>
                </div>
            </div>

        <?php elseif ($page == "books"): ?>
            <h2 class="page-title">Koleksi Buku</h2>
            <a href="#" class="btn">+ Tambah Buku</a>

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

        <?php elseif ($page == "pengguna"): ?>
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

        <?php else: ?>
            <p>Halaman tidak ditemukan.</p>
        <?php endif; ?>

    </div> </div>

</body>
</html>