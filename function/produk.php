<?php
    class Product {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function dataproduk() {
            $getdata = $this->conn->query("SELECT * FROM produk");
            return $getdata->fetchAll(PDO::FETCH_ASSOC);
        }

        public function tambahproduk($nama, $deskripsi, $harga, $stok) {
            $getdata = $this->conn->prepare("INSERT INTO produk (nama, deskripsi, harga, stok) VALUES (?, ?, ?, ?)");
            return $getdata->execute([$nama, $deskripsi, $harga, $stok]);
        }

        public function updateproduk($id, $nama, $deskripsi, $harga, $stok) {
            $getdata = $this->conn->prepare("UPDATE produk SET nama = ?, deskripsi = ?, harga = ?, stok = ? WHERE id = ?");
            return $getdata->execute([$nama, $deskripsi, $harga, $stok, $id]);
        }

        public function hapusproduk($id) {
            $getdata = $this->conn->prepare("DELETE FROM produk WHERE id = ?");
            return $getdata->execute([$id]);
        }
    }
?>