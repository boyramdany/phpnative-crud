<?php
$page = "Contact";
?>

<!DOCTYPE html>
<html lang="en">


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
        <h1 class="text-center mt-5">Contact</h1>
        <div class="row mt-5">
            <div class="col">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas ea labore voluptates temporibus quam provident obcaecati tempore dignissimos alias reprehenderit quae maiores laudantium recusandae, maxime est, nulla voluptatibus facilis. Eveniet adipisci odio recusandae non. Saepe molestias quo iste, consectetur amet perferendis cupiditate nostrum iusto, cum laborum aliquam vitae quaerat veniam?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempore soluta velit voluptatibus, unde vitae recusandae facilis placeat. Facilis, doloremque tempore maxime rerum dicta aut. Corrupti asperiores inventore nisi? Quae?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, expedita?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti minus ipsum quas nam reiciendis excepturi molestiae ipsam tenetur officiis pariatur!
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">

                    <label for="">Address</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">

                    <label for="">Phone Number</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">SEND</button>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php'); ?>