
<h2>Data Pelanggan</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php include '../koneksi.php'; ?>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $pecah['nama_pelanggan']; ?></td>
                <td><?= $pecah['email_pelanggan']; ?></td>
                <td><?= $pecah['telepon_pelanggan']; ?></td>
            </tr>
            <?php $nomor++; ?>
        <?php }; ?>
    </tbody>
</table><br><br>
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