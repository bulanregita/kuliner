<?php 
    session_start();
    include 'koneksi.php';

    // jika belum login tidak bisa masuk ke riwayat
    if(!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])){
        echo "<script>location='login.php';</script>";
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css//bootstrap.css">
    <link rel="shortcut icon" href="admin/assets/img/icon.png">
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <section class="riwayat">
        <div class="container">
            <h3>Riwayat Pembelian <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nomor = 1;
                        // mendapatkan data dari session
                        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                        while($pecah = $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $pecah['tanggal_pembelian']; ?></td>
                        <td>
                            ⦿ <?= $pecah['status_pembelian']; ?>
                            <?php if(!empty($pecah['resi_pengiriman'])) : ?>
                                => Resi : <?= $pecah['resi_pengiriman']; ?>
                            <?php endif; ?>
                        </td>
                        <td><?= number_format($pecah['total_pembelian']); ?></td>
                        <td>
                            <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-default">Nota</a>

                            <?php if($pecah['status_pembelian'] == 'Pending') : ?>
                                <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-info">Konfirmasi Pembayaran</a>
                            <?php else : ?>
                                <a href="lihat_pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section><br><br><br><br><br><br><br>

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