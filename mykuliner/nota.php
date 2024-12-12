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
    <title>Nota Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="shortcut icon" href="admin/assets/img/icon.png">
</head>
<body>
    <?php include 'menu.php'; ?>
    <section class="konten">
        <div class="container">
            

            <!-- ambil dari data admin -->
            <h2>Detail Pembelian</h2>

            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <!-- Jika pelanggan yg beli tidak sama dengan pelanggan yang login, maka akan dilarikan ke riwayat.php karena dia tidak berhak melihat nota oranglain -->
            <!-- pelanggan yang beli harus pelanggan yang login-->
            <?php 
                // mendapatkan id pelanggan yang beli
                $idpelangganyangbeli = $detail['id_pelanggan'];

                // mendapatkan id pelanggan yang login
                $idpelangganyanglogin = $_SESSION['pelanggan']['id_pelanggan'];
                if($idpelangganyangbeli !== $idpelangganyanglogin){
                    echo "<script>location='riwayat.php';</script>";
                }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian : <?= $detail['id_pembelian']; ?></strong><br>
                    Tanggal&ensp;: <?php echo $detail['tanggal_pembelian']; ?><br>
                    Total&ensp;&ensp;&ensp;&ensp;: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong>Nama&ensp;&ensp; : <?php echo $detail['nama_pelanggan']; ?></strong><br>
                    <p>
                        Telepon&nbsp; : <?php echo $detail['telepon_pelanggan']; ?><br>
                        Email&ensp;&ensp;&ensp;: <?php echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?= $detail['kurir']; ?></strong><br>
                    Ongkos Kirim Rp. <?= number_format($detail['tarif']); ?><br>
                    Alamat : <?= $detail['alamat_pengiriman']; ?>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $pecah['nama']; ?></td>
                            <td>Rp. <?= number_format($pecah['harga']); ?></td>
                            <td><?= $pecah['jumlah']; ?></td>
                            <td>Rp. <?= number_format($pecah['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($detail['total_pembelian']); ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p class="my-5">Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
                        <strong>BANK MANDIRI&ensp; 123 &ensp; AN. Warung Kuliner</strong>
                        </p>
                    </div>
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