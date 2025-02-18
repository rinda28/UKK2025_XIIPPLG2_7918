<?php require_once '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Todo List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="login-container bg-white">
        <h2 class="text-center mb-4">Register</h2>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'username_taken'): ?>
            <div class="alert alert-danger">Username telah digunakan</div>
        <?php endif; ?>
        <form action="../controllers/auth.php" method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="form-text">Password harus berisi 8 karakter</div>
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
            <p class="text-center mt-3">
                sudah punya akun?
                <a href="../index.php">Login disini</a>
            </p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function validateForm() {
        var password = document.getElementById('password').value;
        if(password.length < 8) {
            alert('Password harus berisi 8 karakter');
            return false;
        }
        return true;
    }
    </script>
</body>
</html>