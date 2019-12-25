<?php
$page = "Registrasi";
include('connection.php');
include('functions.php');

if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script> 
        alert('Registrasi Berhasil!');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($connect);
    }
}
?>
<html>

<head>
    <title>Registrasi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.css">

</head>

<body>
    <?php include('layout/navbar.php'); ?>

    <div class="container">
        <div class="row my-5">
            <div class="col text-center">
                <h1><?= $page; ?> User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST" name="formRegister" id="formRegister">
                    <div class="form-group">
                        <label for="inputAddress2">Username</label>
                        <input type="text" name="username" class="form-control textbox" placeholder="Username" id="username" minlength="2" maxlength="30" required>
                        <i class="form-control-feedback"></i>
                        <span class="text-warning"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Email</label>
                        <input type="email" name="email" class="form-control textbox" placeholder="Email" id="email" minlength="1" maxlength="30" required>
                        <i class="form-control-feedback"></i>
                        <span class="text-warning"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Password</label>
                            <input type="password" name="password" class="form-control textbox" id="password" placeholder="Password" minlength="4" maxlength="35" required>
                            <i class="form-control-feedback"></i>
                            <span class="text-warning"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirm Password</label>
                            <input type="password" name="password2" class="form-control textbox" id="password2" placeholder="Confirm Password" minlength="4" maxlength="35" required>
                            <i class="form-control-feedback"></i>
                            <span class="text-warning"></span>
                        </div>
                    </div>

                    <div class="butonLogin">
                        <div class="row">
                            <div class="col">
                                <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <a class="btn btn-dark d-block" href="login.php" role="button">Sudah punya akun? Login</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php include('layout/footer.php'); ?>