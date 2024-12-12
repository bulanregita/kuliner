<?php 
    session_start();
    include 'koneksi.php';

    // mendapatkan id_produk dari url
    $id_produk = $_GET['id'];

    // query ambil data
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="shortcut icon" href="admin/assets/img/icon.png">
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <section class="konten">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto_produk/<?= $detail['foto_produk']; ?>" alt="<?= $detail['foto_produk']; ?>" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?= $detail['nama_produk']; ?></h2>
                    <h4>Rp. <?= number_format($detail['harga_produk']); ?></h4>
                    <h5>Stok : <?= $detail['stok_produk']; ?></h5>
                    <?php if(empty($detail['stok_produk'])) : ?>
                        <div class="alert alert-danger">
                            <p>Stok produk sudah habis</p>
                        </div>
                    <?php endif; ?>
                    <p><?= $detail['deskripsi_produk']; ?></p>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah" max="<?= $detail['stok_produk']; ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" name="beli">+ Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php 
                        if(isset($_POST['beli'])) {
                            if($detail['stok_produk'] == 0){
                                echo "<script>alert('Stok produk sudah habis');</script>";
                            } else {
                                // mendapatkan jumlah pembelian
                                $jumlah = $_POST['jumlah'];
                                // masukkan di keranjang belanja
                                $_SESSION['keranjang'][$id_produk] = $jumlah;

                                echo "<script>alert('Produk telah dimasukkan ke keranjang');</script>";
                                echo "<script>location='keranjang.php';</script>";
                            }
                        }
                    ?>

                </div>
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