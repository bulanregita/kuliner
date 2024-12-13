<?php
session_start();
include 'koneksi.php';

?>
<?php 
    $datakategori = array();
    $ambil = $koneksi->query("SELECT * FROM kategori");
    while($tiap = $ambil->fetch_assoc()){
        $datakategori[] = $tiap;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="admin/assets/img/lm.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Kuliner</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    

    <?php include 'menu.php'; ?>


    <section class="konten">
        <div class="container">
            <!-- <h1>Kategori</h1>
            <?php foreach($datakategori as $key => $value) : ?>
                <a style="margin-right: 30px;font-size: 20px" href="kategori.php?id=<?= $value['id_kategori']; ?>"><?= $value['nama_kategori']; ?></a>
            <?php endforeach; ?> -->


            <body>
    <header>
        <h1>Selamat Datang di Website Warung Kuliner indonesia </h1><br>
        <p>Warung makanan kami ini menyediakan banyak makanan</p>
        <p>yang rasanya tidak usah di ragukan lagi ,karena warung</p> 
        <p>kami ini sudah terkenal ke seluruh indonesia dari sabang sampai merauke.</p>
    </header>
</body>
</html>

<style>body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #3887BE;
    color: #fff;
    text-align: center;
    padding: 1em;
}


</style>

            <h1 style="margin-top: 30px;">Produk</h1>
            <div class="row">




                <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                <?php while($perproduk=$ambil->fetch_assoc()) { ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="foto_produk/<?= $perproduk['foto_produk']; ?>" alt="">
                        <div class="caption">
                            <h3><?php echo $perproduk['nama_produk']; ?></h3>
                            <h5>
                                Rp. <?php echo number_format($perproduk['harga_produk']); ?>
                                <?php 
                                    if(empty($perproduk['stok_produk'])){
                                        echo "<small class='text-danger bg-danger'>Stok habis</small>";
                                    }
                                ?>
                            </h5>
                            <a href="beli.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-default">Beli</a>
                            <a href="detail.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-success">Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>




            </div>
        </div>
    </section>
    <div class="footer-bottom">
            <p>&copy; 2023 Warung Kuliner. Hak Cipta Dilindungi.</p>
        </div>


        <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}



.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
}

footer {
    background-color: #4942E4;
    color: #fff;
    padding: 2em 0;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.footer-section {
    flex-basis: 30%;
    margin-bottom: 20px;
}

.footer-section h2 {
    color: #fff;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.links ul {
    list-style: none;
    padding: 0;
}

.links a {
    color: #fff;
    text-decoration: none;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

.btn {
    background-color: #4942E4;
    color: #fff;
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.footer-bottom {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid #777;
}

</style>

</body>
</html>