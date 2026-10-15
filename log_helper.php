<?php
require_once 'db.php';

function catat_log($admin_id, $username, $aksi) {
  global $conn;
  $stmt = $conn->prepare("INSERT INTO log_aktivitas (admin_id, username, aksi) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $admin_id, $username, $aksi);
  $stmt->execute();
}
?>
