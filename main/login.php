<?php
    require_once '../function/function.php';

    if (Auth::islogin()) {
        Auth::redirect('dashboard.php');
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (Auth::login($username, $password)) {
            Auth::redirect('dashboard.php');
        } else {
            $error = "Username atau password salah.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <center>
        <div class="container">
            <h1>Login</h1>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="button">Login</button>
                <?php if ($error) echo "<p class='error'>$error</p>"; ?>
            </form>
            <p>Belum punya akun? <a  class="button" href="register.php">Register di sini</a></p>
        </div>
        </center>
    </body>
</html>