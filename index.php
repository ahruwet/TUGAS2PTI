<?php
    require_once 'function/function.php';

    if (Auth::islogin()) {
        Auth::redirect('main/dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <center>
            <header>
                <h1>Manajemen Produk</h1>
            </header>

            <main>
                <p>Aplikasi mengelola produk. Silakan login atau register untuk lanjut.</p>
                <a href="main/login.php" class="button">Login</a>
                <a href="main/register.php" class="button">Register</a>
            </main>
        </center>
    </body>
</html>