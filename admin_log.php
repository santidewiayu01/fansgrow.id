<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_role'] !== 'superadmin') {
  die("Akses ditolak!");
}

$result = $conn->query("SELECT * FROM log_aktivitas ORDER BY waktu DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Log Aktivitas Admin</title>
  <style>
    body {
      background-color: #0b0b0b;
      color: white;
      font-family: 'Poppins', sans-serif;
      padding: 20px;
    }
    h2 {
      color: #ff8c42;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #333;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #ff8c42;
    }
    td {
      background-color: #1a1a1a;
    }
    tr:hover td {
      background-color: #262626;
    }
  </style>
</head>
<body>
  <h2>📜 Log Aktivitas Admin</h2>
  <table>
    <tr>
      <th>No</th>
      <th>ID Admin</th>
      <th>Username</th>
      <th>Aksi</th>
      <th>Waktu</th>
    </tr>
    <?php 
    $no = 1;
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>".$no++."</td>
              <td>".$row['admin_id']."</td>
              <td>".$row['username']."</td>
              <td>".$row['aksi']."</td>
              <td>".$row['waktu']."</td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>
