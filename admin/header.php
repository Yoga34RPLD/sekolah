<?php
session_start();
include '../koneksi.php';
if(!isset($_SESSION['status_login'])){
    echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
}
date_default_timezone_set("Asia/Jakarta");

$identitas = mysqli_query($conn, "select * from pengaturan order by id desc limit 1");
$d = mysqli_fetch_object($identitas);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - <?= $d->nama ?></title>
    <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector:'#keterangan'
        });
    </script>
</head>
<body class="bg-light">
    
    <div class="navbar">
        <div class="container">
            <h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></a></h2>
            <ul class="nav-menu float-left">
                <li><a href="index.php">Dashboard</a></li>

                <?php if($_SESSION['ulevel'] == 'Super Admin'){ ?>

                <li><a href="pengguna.php">Pengguna</a></li>
                <?php }elseif($_SESSION['ulevel'] == 'Admin'){ ?>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                        <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                        <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li><a href="#"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown">
                            <li><a href="ubah-password.php">Ubah Password</a></li>
                            <li><a href="logout.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>