<?php include 'header.php' ?>
    <div class="content">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    Tambah Jurusan
                </div>
                <div class="box-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Jurusan" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="input-control" placeholder="Keterangan"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="input-control" required>
                        </div>
                        <button type="button" class="btn" onclick="window.location = 'jurusan.php'">Kembali</button>
                        <input type="submit" name="submit" value="Simpan" class="btn btn-blue">
                    </form>
                    

                    <?php
                    if(isset($_POST['submit'])){

                        // print_r($_FILES['gambar']);

                        $nama  = addslashes(ucwords($_POST['nama']));
                        $ket  = addslashes($_POST['keterangan']);

                        $filename = $_FILES['gambar']['name'];
                        $tmpname = $_FILES['gambar']['tmp_name'];
                        $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'jurusan'.time().'.'.$formatfile;
                        $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                        if(!in_array($formatfile, $allowedtype)){
                            echo '<div class="alert alert-error">Format File Tidak Di Ijinkan</div>';
                        }elseif($filesize > 3000000){
                            echo '<div class="alert alert-error">Ukuran File Tidak Boleh Lebih Dari 3MB</div>';
                        }else{

                            move_uploaded_file($tmpname, "../uploads/jurusan/".$rename);

                                $simpan = mysqli_query($conn, "insert into jurusan values (
                                    null,
                                    '".$nama."',
                                    '".$ket."',
                                    '".$rename."',
                                    null,
                                    null
                                )");
                                    if($simpan){
                                        echo '<div class="alert alert-success">Simpan Berhasil</div>';
                                    }else{
                                        echo 'Gagal Disimpan' .mysqli_error($conn);
                                    }
                                }
                            }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>