<?php
    include "koneksi.php";

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register My To Do List</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #D17D98;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register My To Do List</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['register'])) {
                                                $username = $_POST['username'];
                                                $password = $_POST['password'];
                                                $email = $_POST['email'];
                                                $nama = $_POST['nama'];

                                                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
                                                    echo '<script>alert("Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan simbol!"); location.href="register.php";</script>';
                                                    exit();
                                                }

                                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                                $insert = mysqli_query($koneksi, "INSERT INTO users(username,password,email,nama) VALUES('$username','$password','$email','$nama')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, register berhasil. Silahkan Login"); location.href="login.php"</script>';
                                                 }else{
                                                    echo "Error: " . mysqli_error($koneksi);
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control py-10" type="username" required name="username" placeholder="Masukkan Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-10" id="inputPassword" required type="password" name="password" placeholder="Masukkan Password"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control py-10" type="text" required name="email" placeholder="Masukkan Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Nama</label>
                                                <input class="form-control py-10" type="text" required name="nama" placeholder="Masukkan Nama Lengkap"/>
                                            </div>
                                            <div class=" form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-outline-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-outline-danger" href="login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            &copy; 2025 My To Do List.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
