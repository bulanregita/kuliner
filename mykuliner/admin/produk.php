<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../koneksi.php'; 
if(!isset($_SESSION['admin'])){
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php'</script>";
    header("Location:login.php");
    exit();
}
?>
<h2>Data Produk</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $pecah['nama_produk']; ?></td>
                <td><?= $pecah['harga_produk']; ?></td>
                <td><?= $pecah['berat_produk']; ?></td>
                <td>
                    <img src="../foto_produk/<?= $pecah['foto_produk']; ?>" width="100px">
                </td>
                <td><?= $pecah['deskripsi_produk']; ?></td>
                <td><?= $pecah['stok_produk']; ?></td>
                <td>
                    <a href="index.php?halaman=hapusproduk&id=<?= $pecah['id_produk']; ?>" class="btn btn-danger">hapus</a><br>
                    <a href="index.php?halaman=ubahproduk&id=<?= $pecah['id_produk']; ?>" class="btn btn-warning">ubah</a>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a><br><br><br><br><br><br>

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