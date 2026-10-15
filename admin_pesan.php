<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: admin_login.php");
  exit();
}

$role = $_SESSION['admin_role'];
$result = $conn->query("SELECT * FROM pesan ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Masuk - Admin FansGrow.id</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0b0b0b;
      color: white;
      margin: 0;
      padding: 20px;
    }
    h2 {
      color: #ff8c42;
      text-align: center;
      margin-bottom: 10px;
    }
    .logout-btn {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .logout-btn a {
      color: white;
      background-color: #ff5c5c;
      padding: 8px 15px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    }
    .logout-btn a:hover {
      background-color: #ff7b7b;
    }
    .btn-log {
      background: #ff8c42;
      color: white;
      padding: 8px 15px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
      margin-left: 10px;
    }
    .btn-log:hover {
      background-color: #ffa45c;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #333;
    }
    th {
      background-color: #ff8c42;
      color: white;
      padding: 12px;
    }
    td {
      background-color: #1a1a1a;
      padding: 10px;
    }
    tr:hover td {
      background-color: #262626;
    }
    .delete-btn {
      background: #e74c3c;
      border: none;
      color: white;
      padding: 6px 12px;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }
    .delete-btn:hover {
      background-color: #ff6659;
    }
  </style>
</head>
<body>
  <h2>📩 Pesan Masuk FansGrow.id</h2>

  <div class="logout-btn">
    <div>
      Halo, <strong><?= $_SESSION['admin_username']; ?></strong> (<?= $role; ?>)
    </div>
    <div>
      <?php if ($_SESSION['admin_role'] === 'superadmin'): ?>
        <a href="admin_log.php" class="btn-log">Lihat Log Aktivitas</a>
      <?php endif; ?>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Pesan</th>
      <th>Tanggal</th>
      <?php if ($role === 'superadmin'): ?>
      <th>Aksi</th>
      <?php endif; ?>
    </tr>
    <?php 
    $no = 1;
    while($row = $result->fetch_assoc()) { 
      echo "<tr>
              <td>".$no++."</td>
              <td>".$row['nama']."</td>
              <td>".$row['email']."</td>
              <td>".$row['pesan']."</td>
              <td>".$row['tanggal']."</td>";
      if ($role === 'superadmin') {
        echo "<td>
                <form method='POST' action='hapus_pesan.php' style='display:inline;'>
                  <input type='hidden' name='id' value='".$row['id']."'>
                  <button type='submit' class='delete-btn'>Hapus</button>
                </form>
              </td>";
      }
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
