<?php
session_start();
$page = "Login";
include('connection.php');
include('functions.php');

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    //ambil username berdasarkan id
    $result = mysqli_query($connect, "SELECT * FROM user WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// kalau session gak ada di balikin ke halaman login, ga bisa ke index.php
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];



    $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek password dibandingkan dengan fungsi verivy
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            //set session 
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST['remember'])) {
                //setcookie punya 3 parameter, 1.key nya, 2, valuenya, 3. waktu expirednya
                setcookie('id', $row['id'], time() + 60);
                //key ini sebenernya username, set cookie yang usernamenya di encrypt algo hash
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            echo "<script> alert('Berhasil Login, Selamat datang $username' ); 
                    document.location.href = 'index.php';
                    </script>";
            exit;
        }
    }

    $error = true;
}
?>

<head>
    <title><?= $page; ?></title>
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
                <h1>Login User</h1>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        Username or Password Wrong !
                    </div>
                <?php endif; ?>
                <form action="" method="POST" id="formLogin">
                    <div class="form-group">
                        <label for="inputAddress2">Username</label>
                        <input type="text" name="username" class="form-control textbox" placeholder="Username" id="username" required>
                        <i class="form-control-feedback"></i>
                        <span class="text-warning"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Password</label>
                        <input type="password" name="password" class="form-control textbox" placeholder="Password" id="password" required>
                        <i class="form-control-feedback"></i>
                        <span class="text-warning"></span>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inlineFormCheck" name="remember" id="remember">
                            <label class="form-check-label" for="inlineFormCheck">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="butonLogin">
                        <div class="row">
                            <div class="col ">
                                <button type="submit" name="login" class="btn btn-primary btn-block" style="display: block;   " role="button"> Login</button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <a class="btn btn-dark d-block" href="registrasi.php" role="button"> Register</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('layout/footer.php'); ?>