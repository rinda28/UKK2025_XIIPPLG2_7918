<div class="login-container -bg-white">
    <h2 class="teks-center mb-4">Todo List App</h2>
    <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
        <div class="alert alert-danger">Pasword atau Username salah</div>
    <?php endif; ?>
    <?php if(isset($_GET['error']) && $_GET['msg'] == 'invalid'): ?>
        <div class="alert alert-danger">Username telah ditambah! Please Login</div>
    <?php endif; ?>
    <?php if(isset($_GET['error']) && $_GET['msg'] == 'registered'): ?>
        <div class="alert alert-success">Registrasi berhasil! Silakan login.</div>
    <?php endif; ?>
    <form action="controllers/auth.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        <p class="text-center mt-3">
             Belum punya akun
            <a href="views/register.php">Register here</a>
        </p>
    </form>
</div>