<?php
$host = "localhost";
$user = "root";      // default user XAMPP
$pass = "";          // password kosong (kalau kamu belum ubah)
$db   = "fansgrow";  // nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
