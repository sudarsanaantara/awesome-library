<div class="login-container">
    <h2>Login</h2>

    <?php if (isset($data['message'])): ?>
        <div class="message-box <?= $data['failed'] ? 'message-box-fail' : '' ?>"><?= $data['message'] ?></div>
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

    <p>Belum punya akun? <a href="register">Daftar</a></p>
</div>