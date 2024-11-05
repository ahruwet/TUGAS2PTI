<?php
    class Database {
        private $host = "localhost";
        private $database = "produk_10122251";
        private $username = "root";
        private $password = "";
        private $conn;
        private static $instance = null;

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Koneksi database gagal: " . $e->getMessage());
            }
        }
    
        public static function get_instance() {
            if (!self::$instance) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public function get_koneksi() {
            return $this->conn;
        }

        public function cek_koneksi()
        {
            if ($this->conn->connect_error) {
                die("Koneksi database gagal : " . $this->conn->connect_error);
            } else {
                echo "Koneksi database berhasil !";
            }
        }
    }
?>