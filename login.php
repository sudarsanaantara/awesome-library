<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Login admin
    if ($username == "admin" && $password == "123") {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = "admin";
        header("Location: dashboard_admin.php");
        exit();

    // Login user
    } elseif ($username == "user" && $password == "123") {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = "user";
        header("Location: dashboard_user.php");
        exit();

    } else {
        $message = "❌ Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <?php if ($message): ?>
        <div class="message-box"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
</div>

</body>
</html>