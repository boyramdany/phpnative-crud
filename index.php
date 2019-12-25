<?php
session_start();
$page = "Home";
// kalau session gak ada di balikin ke halaman login, ga bisa ke index.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

include('connection.php');
include('functions.php');

$totalData = mysqli_query($connect, "SELECT * FROM karyawan");
$totalData = mysqli_fetch_assoc($totalData);

//Pagination
$jumlahDataPerHalaman   = 3;
$jumlahData             = count($totalData);
$jumlahHalaman          = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif           = (isset($_GET["page"])) ? $_GET["page"] :  1;

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// var_dump($jumlahData);
// die;


// LIMIT , NILAI 1 = INDEX DIMULAI DARI 0, NILAI-2 = JUMLAH DATA YANG MAU DI TAMPILIN
$query = mysqli_query($connect, "SELECT * FROM karyawan LIMIT $awalData, $jumlahDataPerHalaman");

// Parameter ke-2 mysqli assoc mengembalikan nilai assosiative
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
// mengambil data (fetch) karyawan dari object query
// mysqli_fetch_rows() -> Mengembalikan array Numeric 1 baris aja
// mysqli_fetch_assoc() -> Mengembalikan array Asosiative Key 1 baris aja
// mysqli_fetch_array() -> Mengembalikan array numeric, dan assosiative double jadinya
// mysqli_fetch_object() -> Mengembalikan object harus pake panah -> cth : $result->nama

// var_dump($result);
// die;
if (isset($_POST["search"])) {
    $result = cari($_POST["keyword"]);
}

?>
<html>

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
        <div class="row">
            <div class="col text-center mt-5">
                <h1>Daftar Mahasiswa </h1>
                <span>Created By. Boy Ramdany</span>
            </div>
        </div>

        <nav class="navbar navbar-expand-sm navbar-dark bg-primary mt-5">
            <a class="navbar-brand" href="index.php">PHP NATIVE CRUD</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                </ul>
                <form class="form-inline my-2 my-lg-0" action="" method="POST">
                    <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Search" autocomplete="off" id="keyword">
                    <button class="btn btn-outline-light my-2 my-sm-0" name="search" type="submit" id="tombol-cari">Search </button>
                </form>
            </div>
        </nav>

        <div class="row mt-5 mb-2">
            <div class="col">
                <a class="btn btn-primary" href="tambah.php">
                    Tambah Data
                </a>
            </div>
            <div class="col text-right">
                <a class="btn btn-outline-dark" href="cetak.php" target="_blank">
                    <i class="fas fa-print"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col text-center justify-content-center">
                <div id="container-table">
                    <table class="table table-hover table-inverse table-responsive-lg">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($result as $result) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><img src="<?= 'img/' . $result['gambar'] ?>" width="60dpx" height="60px"></td>
                                    <td><?= $result['nama'] ?></td>
                                    <td><?= $result['email'] ?></td>
                                    <td><?= $result['alamat'] ?></td>
                                    <td><?= $result['umur'] ?></td>
                                    <td><?= $result['jenis_kelamin'] ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6 col-lg-6">
                                                <a class="btn btn-warning btn-sm" href="ubah.php?id_karyawan=<?= $result['id_karyawan']; ?>" style=" display:block; text-align: center; text-decoration: none;">
                                                    <i class="fas fa-edit"></i>Edit
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6">
                                                <a class="btn btn-danger btn-sm" href="delete.php?id_karyawan=<?= $result['id_karyawan']; ?>" style=" display:block; text-align: center; text-decoration: none; " onclick="return confirm('Yakin ingin menghapus?');">
                                                    <i class="fas fa-trash"></i>Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php if ($halamanAktif > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item active">
                                    <a class="page-link" href="?page=<?= $i; ?>">
                                        <?= $i; ?>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $i; ?>">
                                        <?= $i; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>


                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $halamanAktif + 1 ?>">
                                    Next
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <?php include('layout/footer.php'); ?>