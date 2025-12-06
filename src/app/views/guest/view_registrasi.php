<div class="login-container">
    <h2>Registrasi</h2>

    <?php if ($data["message"]): ?>
        <div class="message-box <?= $data['failed'] ? 'message-box-fail' : 'message-box-success' ?>"><?= $data["message"] ?></div>
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

    <p>Sudah punya akun? <a href="<?= BASEURL ?>/login">Login</a></p>
</div>