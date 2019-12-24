<?php
$dbname = 'latihan';
$servername = 'localhost';
$username = 'root';
$password = '';

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect)
    die('Connection failed: ' . mysqli_connect_error());

// if (mysqli_affected_rows($connect) > 0) {
//     echo "Data berhasil ditambahkan";
// } else {
//     echo "Gagal";
// }
