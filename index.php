<?php
require_once('function/helper.php');
require_once('function/koneksi.php');
$process = isset($_GET['process']) ? ($_GET['process']) : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Memasukkan stylesheet Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <!-- Memasukkan custom CSS -->
    <style>
        body {
            background-image: url('12.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.1);
        }
        .login-container h4 {
            margin-bottom: 30px;
        }
        .login-container form .form-floating label {
            color: #6c757d;
        }
        .login-container form .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- info login -->
            <?php if ($process == 'successregister') : ?>
                <div class="alert alert-success" style="background-color: green; padding: 1em; color: white;border-radius: 20px;">
                    Register berhasil, silahkan masuk dengan akun anda
                </div>
            <?php endif; ?>
            
        <!-- info registrasi -->
            <?php if ($process == 'failedempty') : ?>
                <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                    Register gagal, terdapat form yang kosong
                </div>
            <?php endif; ?>
            <?php if ($process == 'failedusername') : ?>
                <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                    Register gagal, username sudah terdaftar di database
                </div>
            <?php endif; ?>
            <?php if ($process == 'failedpassword') : ?>
                <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                    Register gagal, password tidak sesuai
                </div>
            <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="login-container">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registrasi</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <h4 class="text-center">LOGIN</h4>
                            <form method="POST" action="<?= BASE_URL . 'process/process_login.php' ?>">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email" placeholder="username" name="username">
                                    <label for="email">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    <label for="password">Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <h4 class="text-center">REGISTRASI</h4>
                            <form method="POST" action="<?= BASE_URL . 'process/process_register.php' ?>">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password-reg" placeholder="Password" name="password">
                                    <label for="password-reg">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="confirm-password" placeholder="Ulangi Password" name="repassword">
                                    <label for="confirm-password">Ulangi Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Registrasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Memasukkan script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
