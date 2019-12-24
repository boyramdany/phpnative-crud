<?php
include('connection.php');
include('functions.php');

$id = $_GET['id_karyawan'];
if (hapus($id) > 0) {
    echo "<script> 
        alert('Berhasil di hapus!');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script> 
        alert('Gagal di hapus!');
        document.location.href = 'index.php';
        </script>";
}
