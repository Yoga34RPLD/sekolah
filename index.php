<?php include 'header.php'; ?>

    <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_sekolah ?>');">
        <div class="banner-teks">
            <div class="container">
                <h3>Selamat datang di <?= $d->nama ?></h3>
                <p>Sekolah Menengah Kejuruan dengan berbagai jurusan yang dapat anda pilih sesuai minat dan bakat anda</p>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container text-center">
            <h3>sambutan Kepala Sekolah</h3>
            <img src="uploads/identitas/<?= $d->foto_kepsek ?>" width="200px">
            <h4><?= $d->nama_kepsek ?></h4>
            <p><?= $d->sambutan_kepsek ?></p>
        </div>
    </div>

    <div class="section" id="jurusan">
        <div class="container text-center">
            <h3>Jurusan</h3>

            <?php
            $jurusan = mysqli_query($conn,"select * from jurusan order by id desc");
            if(mysqli_num_rows($jurusan) > 0){
                while($j = mysqli_fetch_array($jurusan)){
            ?>

            <div class="col-4">
                <a href="detail-jurusan.php?id=<?= $j['id'] ?>" class="thumbnail-link">
                <div class="thumbnail-box">
                    <div class="thumbnail-img" style="background-image: url('uploads/jurusan/<?= $j['gambar'] ?>');">

                    </div>
                    <div class="thumbnail-text">
                        <?= $j['nama'] ?>
                    </div>
                </div>
                </a>
            </div>

            <?php }}else{ ?>
                Tidak Ada Data            
            <?php } ?>
        </div>
    </div>

    <div class="section">
        <div class="container text-center">
            <h3>Informasi Terbaru</h3>

            <?php
            $informasi = mysqli_query($conn,"select * from informasi order by id desc limit 8");
            if(mysqli_num_rows($informasi) > 0){
                while($p = mysqli_fetch_array($informasi)){
            ?>

            <div class="col-4">
                <a href="detail-informasi.php?id=<?= $p['id'] ?>" class="thumbnail-link">
                <div class="thumbnail-box">
                    <div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $p['gambar'] ?>');">

                    </div>
                    <div class="thumbnail-text">
                        <?= substr($p['judul'], 0, 50) ?>
                    </div>
                </div>
                </a>
            </div>

            <?php }}else{ ?>
                Tidak Ada Data            
            <?php } ?>

        </div>
    </div>
<?php include 'footer.php'; ?>