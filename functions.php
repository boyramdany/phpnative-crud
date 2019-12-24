<?php
include('connection.php');

function tambah($data)
{
    global $connect;

    $nama           = htmlspecialchars($data['nama']);
    $email          = htmlspecialchars($data['email']);
    $alamat         = htmlspecialchars($data['alamat']);
    $umur           = htmlspecialchars($data['umur']);
    $jenis_kelamin  = htmlspecialchars($data['jenis_kelamin']);



    // // Upload Gambar
    $gambar         = upload();
    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO karyawan 
                VALUES
                ('', '$nama', '$email', '$alamat', '$umur', '$jenis_kelamin', '$gambar')
            ";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function upload()
{
    $namaFile   = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];
    $tmpName    = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
             </script>";

        return false;
    }

    // Cek Yang boleh di upload hanya gambar cek melalui extensi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // fungsi explode untuk memecah sebuah string menjadi array, memecah nya dengan menggunakan delimeter cth Sandika.jpg   
    $ekstensiGambar = explode('.', $namaFile);
    // fungsi end mengambil huruf yg paling terakhir
    // fungsi strtolower diubah jadi huruf kecil smua
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // fungsi in_array() buat ngecek adaga string di dalam sebuah array
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('Yang anda upload bukan gambar');
                </script>";

        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
                    alert('Ukuran Gambar terlalu Besar');
                </script>";

        return false;
    }

    // Lolos pengecekan gambar siap di upload
    // fungsi moveuploadedile memindahkan ke direktori
    move_uploaded_file($tmpName, 'img/' . $namaFile);

    return $namaFile;
}

function hapus($id)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM karyawan WHERE id_karyawan = $id ");

    return mysqli_affected_rows($connect);
}

function ubah($data)
{
    global $connect;

    $id             = $data['id_karyawan'];
    $nama           = htmlspecialchars($data['nama']);
    $email          = htmlspecialchars($data['email']);
    $alamat         = htmlspecialchars($data['alamat']);
    $umur           = htmlspecialchars($data['umur']);
    $jenis_kelamin  = htmlspecialchars($data['jenis_kelamin']);
    $gambar         = htmlspecialchars($data['gambar']);

    $query = "UPDATE karyawan SET 
                nama='$nama', 
                email='$email',
                alamat='$alamat', 
                umur='$umur', 
                jenis_kelamin='$jenis_kelamin',
                gambar='$gambar'
                WHERE id_karyawan= '$id'
            ";

    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function cari($keyword)
{
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM karyawan WHERE 
                            nama LIKE '%$keyword%' OR
                            alamat LIKE '%$keyword%' OR
                            umur LIKE '%$keyword%' OR
                            jenis_kelamin LIKE '%$keyword%'
            ");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $result;
}

function registrasi($data)
{
    global $connect;
    $username   = strtolower(stripslashes($data["username"]));
    $email      = $data["email"];
    $password   = mysqli_real_escape_string($connect, $data["password"]);
    $password2  = mysqli_real_escape_string($connect, $data["password2"]);

    //cek user ada atau belum
    $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
        alert('Username Sudah ada');
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> 
        alert('Password tidak sesuai!');
        </script>";
    }

    // Encrypt Password menggunakan Hash , Password default biar phpnya yg milih algoritmanya
    $password   = password_hash($password, PASSWORD_DEFAULT);
    $query      = "INSERT INTO user VALUES ('','$username','$email','$password')";

    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

// function login($data)
// {
//     global $connect;
//     $username = $data["username"];
//     $password = $data["password"];

// }
// function checkEmail($email)
// {
//     global $connect;

//     mysqli_query($connect, "SELECT * FROM user WHERE email='$email' ");
//     return mysqli_affected_rows($connect);
// }
