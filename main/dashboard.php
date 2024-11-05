<?php
    require_once '../function/db.php';
    require_once '../function/function.php';

    $db = new Database();
    $conn = $db->get_koneksi();

    if (!Auth::islogin()) {
        Auth::redirect('login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <center>
            <h1>Dashboard</h1>
            <p>Selamat datang, <?php echo $_SESSION['role']; ?>!</p>
            <a  class="button" href="admin.php">Lihat Produk</a>
            <a  class="button" href="logout.php">Logout</a>
        </center>
    </body>
</html>