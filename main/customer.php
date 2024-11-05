<?php
    require_once '../function/db.php';
    require_once '../function/function.php';
    require_once '../function/produk.php';

    $db = new Database();
    $conn = $db->get_koneksi();

    if (!Auth::islogin()) {
        Auth::redirect('login.php');
    }

    $produkmanage = new Product($conn);
    $products = $produkmanage->dataproduk();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Produk</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>
        <center>
            <h1>Daftar Produk</h1>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
                <?php foreach ($products as $produk): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produk['id']); ?></td>
                    <td><?php echo htmlspecialchars($produk['nama']); ?></td>
                    <td><?php echo htmlspecialchars($produk['deskripsi']); ?></td>
                    <td>Rp. <?php echo number_format($produk['harga'],0,".","."); ?></td>
                    <td><?php echo htmlspecialchars($produk['stok']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
                
            <a  class="button" href="dashboard.php">Kembali ke Dashboard</a>
        </center>
    </body>
</html>