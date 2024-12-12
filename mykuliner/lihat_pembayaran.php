<?php 
    session_start();
    include 'koneksi.php';

    $id_pembelian = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
    $detbay = $ambil->fetch_assoc();

    // jika data pembayaran masih kosong
    if(empty($detbay)){
        echo "<script>alert('Silahkan Konfirmasi Pembayaran anda');</script>";
        echo "<script>location='riwayat.php';</script>";
        exit();
    }

    // tidak bisa melihat data pembayaran pelanggan lain
    if($_SESSION['pelanggan']['id_pelanggan'] !== $detbay['id_pelanggan']){
        echo "<script>location='riwayat.php';</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pembayaran</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="shortcut icon" href="admin/assets/img/icon.png">
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <div class="container">
        <h3>Data Pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?= $detbay['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?= $detbay['bank']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $detbay['tanggal']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td><?= $detbay['jumlah']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="bukti_pembayaran/<?= $detbay['bukti']; ?>" alt="" class="img-responsive">
            </div>
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