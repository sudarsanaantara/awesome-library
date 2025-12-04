<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $NamaLengkap  = $_POST["fullname"];
    $NamaPengguna = $_POST["username"];
    $AlamatEmail  = $_POST["email"];
    $Password     = $_POST["password"];
    $Konfirmasi   = $_POST["confirmPassword"];

    if ($Password !== $Konfirmasi) {
        $message = "Password dan konfirmasi password tidak sama!";
    } else {
        $message = "Registrasi berhasil! Silakan login.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Registrasi</h2>

    <?php if ($message): ?>
        <div class="message-box"><?= $message ?></div>
    <?php endif; ?>

    <form id="registerForm" action="" method="POST">
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Konfirmasi Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</div>

<script src="script.js"></script>
</body>
</html>