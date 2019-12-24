<?php
session_start();
// kalau session gak ada di balikin ke halaman login, ga bisa ke index.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

include('connection.php');
include('functions.php');
// Mengecek Apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script> 
        alert('Data Berhasil di Tambah!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script> 
        alert('Data Gagal di Tambah!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.css">
</head>

<body>
    <?php include('layout/navbar.php'); ?>

    <div class="container">
        <div class="addKaryawan">
            <h1 class="text-center my-5">Tambah Data Karyawan</h1>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="tex" name="umur" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control-file" id="gambar">
                </div>

                <div class="tombolButon mt-5">
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a name="back" id="back" class="btn btn-success" href="index.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include('layout/footer.php'); ?>