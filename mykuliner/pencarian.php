<?php 
    include 'koneksi.php';

    $keyword = $_GET['keyword'];
    $semuadata=array();
    $ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' OR harga_produk LIKE '%$keyword%'");
    while($pecah = $ambil->fetch_assoc()){
        $semuadata[]=$pecah;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="shortcut icon" href="admin/assets/img/icon.png">
</head>
<body>
    <?php 
        include 'menu.php';
    ?>
    <div class="container">
        <h3>Hasil Pencarian : <?= $keyword ?></h3> <br>

        <?php if(empty($semuadata)) : ?>
            <div class="alert alert-danger">Produk <b><?= $keyword; ?></b> tidak ditemukan</div>
        <?php endif; ?>
        <div class="row">

        <?php foreach($semuadata as $key => $value) : ?>

            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="foto_produk/<?= $value['foto_produk']; ?>" alt="" class="img-responsive">
                    <div class="caption">
                        <h3><?php echo $value['nama_produk']; ?></h3>
                            <h5>Rp. <?php echo number_format($value['harga_produk']); ?></h5>
                            <a href="beli.php?id=<?= $value['id_produk']; ?>" class="btn btn-default">Beli</a>
                            <a href="detail.php?id=<?= $value['id_produk']; ?>" class="btn btn-success">Detail</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
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