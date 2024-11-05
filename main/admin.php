<?php
    require_once '../function/db.php';
    require_once '../function/function.php';
    require_once '../function/produk.php';

    $db = new Database();
    $conn = $db->get_koneksi();

    if (!Auth::islogin()) {
        Auth::redirect('login.php');
    }

    if (!Auth::isadm()) {
        Auth::redirect('customer.php');
    }

    $produkmanage = new Product($conn);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add'])) {
            $produkmanage->tambahproduk(
                $_POST['nama'], 
                $_POST['deskripsi'], 
                $_POST['harga'], 
                $_POST['stok']
            );
        } elseif (isset($_POST['update'])) {
            $produkmanage->updateproduk(
                $_POST['id'],
                $_POST['nama'],
                $_POST['deskripsi'],
                $_POST['harga'],
                $_POST['stok']
            );
        } elseif (isset($_POST['delete'])) {
            $produkmanage->hapusproduk($_POST['id']);
        }
    }

    $products = $produkmanage->dataproduk();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kelola Produk</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>
        <center>
            <h1>Kelola Produk</h1>
            <h2>Tambah Produk</h2>
            <form method="POST" action="">
                <input type="text" name="nama" placeholder="Nama Produk" required>
                <input type="text" name="deskripsi" placeholder="Deskripsi" required>
                <input type="number" name="harga" placeholder="Harga" required>
                <input type="number" name="stok" placeholder="Stok" required>
                <button type="submit" name="add">Tambah Produk</button>
            </form>

            <h2>Daftar Produk</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($products as $produk): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produk['id']); ?></td>
                    <td><?php echo htmlspecialchars($produk['nama']); ?></td>
                    <td><?php echo htmlspecialchars($produk['deskripsi']); ?></td>
                    <td>Rp. <?php echo number_format($produk['harga'],0,".","."); ?></td>
                    <td><?php echo htmlspecialchars($produk['stok']); ?></td>
                    <td>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produk['id']); ?>">
                            <input type="text" name="nama" value="<?php echo htmlspecialchars($produk['nama']); ?>" required>
                            <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($produk['deskripsi']); ?>" required>
                            <input type="number" name="harga" value="<?php echo htmlspecialchars($produk['harga']); ?>" required>
                            <input type="number" name="stok" value="<?php echo htmlspecialchars($produk['stok']); ?>" required>
                            <button type="submit" name="update">Ubah</button>
                        </form>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produk['id']); ?>">
                            <button type="submit" name="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
                
            <a href="dashboard.php">Kembali ke Dashboard</a>
        </center>
    </body>
</html>