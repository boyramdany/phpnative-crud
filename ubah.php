<?php
session_start();
// kalau session gak ada di balikin ke halaman login, ga bisa ke index.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

include('connection.php');
include('functions.php');

$id = $_GET['id_karyawan'];

$query = mysqli_query($connect, "SELECT * FROM karyawan WHERE id_karyawan = $id ");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script> 
        alert('Data berhasil di ubah!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script> 
        alert('Data gagal di ubah!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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
        <div class="editKaryawan">
            <h1 class="text-center my-5">Ubah Data Karyawan</h1>
            <div class="row mt-3">
                <div class="col">
                    <a class="btn btn-outline-info" href="index.php" role="button">Back</a>
                </div>
            </div>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id_karyawan" value="<?= $result[0]['id_karyawan']; ?>">
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="nama" class="form-control" value="<?= $result[0]['nama']; ?>">
                        </div>
                        <div class="col text-right">
                            <img src="img/<?= $result[0]['gambar']; ?>" class="img-fluid rounded-circle" width="50" height="50">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $result[0]['email']; ?>">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"><?= $result[0]['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Umur</label>
                    <input type="tex" name="umur" class="form-control" value="<?= $result[0]['umur']; ?>">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="Pria" <?= ($result[0]['jenis_kelamin'] == 'Pria') ? 'selected' : '' ?>>Pria</option>
                        <option value="Wanita" <?= ($result[0]['jenis_kelamin'] == 'Wanita') ? 'selected' : '' ?>>Wanita</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Baru</label>
                    <input type="file" name="gambar" class="form-control-file" id="gambar">
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-success btn-block">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <?php include('layout/footer.php'); ?>