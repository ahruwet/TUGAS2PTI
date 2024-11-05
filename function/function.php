<?php
    session_start();
    require_once 'db.php';

    class Auth {
        public static function islogin() {
            return isset($_SESSION['user_id']);
        }

        public static function isadm() {
            return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
        }

        public static function redirect($url) {
            header("Location: $url");
            exit();
        }

        public static function login($username, $password) {
            $db = Database::get_instance();
            $conn = $db->get_koneksi();

            $getdata = $conn->prepare("SELECT * FROM user WHERE username = ?");
            $getdata->execute([$username]);
            $user = $getdata->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['tipe'];
                return true;
            }
            return false;
        }

        public static function register($username, $password) {
            $db = Database::get_instance();
            $conn = $db->get_koneksi();
            
            $check = $conn->prepare("SELECT * FROM user WHERE username = ?");
            $check->execute([$username]);
            if ($check->rowCount() > 0) {
                return false;
            }
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $getdata = $conn->prepare("INSERT INTO user (username, password, tipe) VALUES (?, ?, 'customer')");
            return $getdata->execute([$username, $hashed_password]);
        }
    }
?>