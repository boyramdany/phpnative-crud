<?php
include('../functions.php');

$keyword = $_GET["keyword"];

$query = mysqli_query($connect, "SELECT * FROM karyawan WHERE 
                            nama LIKE '%$keyword%' OR
                            alamat LIKE '%$keyword%' OR
                            umur LIKE '%$keyword%' OR
                            jenis_kelamin LIKE '%$keyword%'
            ");


// Parameter ke-2 mysqli assoc mengembalikan nilai assosiative
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<head>
    <title>PHP NATIVE CRUD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.css">
</head>

<body>

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
        </div>
    </div>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="script.js"></script>
</body>

</html>