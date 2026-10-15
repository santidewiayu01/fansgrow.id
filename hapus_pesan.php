<?php
session_start();
require 'db.php';
require 'log_helper.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_role'] !== 'superadmin') {
  die("Akses ditolak!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $conn->query("DELETE FROM pesan WHERE id = $id");

  // Catat log
  catat_log($_SESSION['admin_id'], $_SESSION['admin_username'], "Menghapus pesan ID: $id");
}

header("Location: admin_pesan.php");
exit();
?>
