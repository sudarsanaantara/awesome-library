<?php
if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["login"])) {
    header("Location: " . BASEURL);
    exit();
}

$username = "admin";

$page = isset($_GET["page"]) ? $_GET["page"] : "home";
?>

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
        <h2 class="page-title">Dashboard Utama</h2>
        <div class="stats">
            <div class="card">
                <p>User Aktif</p>
                <h3><?= $data["total_user"] ?></h3>
            </div>

            <div class="card">
                <p>Total Buku</p>
                <h3><?= $data["total_book"]?></h3>
            </div>

            <div class="card">
                <p>Peminjaman Berjalan</p>
                <h3><?= $data["total_lend"] ?></h3>
            </div>
        </div>
    </div>
</div>