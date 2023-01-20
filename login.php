<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="page-login">
        <div class="box box-login">
            <div class="box-header text-center">
                Login
            </div>
            <div class="box-body">
                <?php
                    if(isset($_GET['msg'])){
                        echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
                    }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Password" class="input-control">
                    </div>

                    <input type="submit" name="submit" value="Login" class="btn">
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $user = mysqli_real_escape_string($conn, $_POST['user']);
                        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                        $cek = mysqli_query($conn, "select * from pengguna where username = '".$user."' ");
                        if(mysqli_num_rows($cek) > 0){
                            $d = mysqli_fetch_object($cek);
                            if(md5($pass) == $d->password){
                                $_SESSION['status_login']   = true;
                                $_SESSION['uid']            =$d->id;
                                $_SESSION['uname']          =$d->nama;
                                $_SESSION['ulevel']         =$d->level;

                                echo "<script>window.location = 'admin/index.php'</script>";
                            }else{
                                echo '<div class="alert alert-error">Password Salah</div>';
                            }
                        }else{
                            echo '<div class="alert alert-error">Username Tidak Ditemukan</div>';
                        }
                    }
                ?>

            </div>
            <div class="box-footer text-center">
                <a href="inded.php">Halaman utama</a>
            </div>
        </div>
    </div>

</body>
</html>