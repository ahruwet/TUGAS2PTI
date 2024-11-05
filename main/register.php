<?php
    require_once '../function/function.php';

    if (Auth::islogin()) {
        Auth::redirect('dashboard.php');
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $error = "Password tidak cocok.";
        } else {
            try {
                if (Auth::register($username, $password)) {
                    Auth::redirect('login.php');
                } else {
                    $error = "User Sudah ada silahkan pakai yang lain";
                }
            } catch (PDOException $e) {
                $error = "Error: " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="../style/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <center>
            <h1>Register</h1>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
            </form>
            <?php if ($error) echo "<p class='error'>$error</p>"; ?>
            <p>Sudah punya akun? <a  class="button" href="login.php">Login</a></p>
        </center>
    </body>
</html>