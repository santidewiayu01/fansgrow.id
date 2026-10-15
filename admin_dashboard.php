<?php
session_start();
require 'db.php';
require 'log_helper.php';

// Cek login
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: admin_login.php");
  exit();
}

// Ambil data ringkasan
$total_pesan = $conn->query("SELECT COUNT(*) AS total FROM pesan")->fetch_assoc()['total'];
$total_admin = $conn->query("SELECT COUNT(*) AS total FROM admin")->fetch_assoc()['total'];
$total_log   = $conn->query("SELECT COUNT(*) AS total FROM log_aktivitas")->fetch_assoc()['total'];
$total_pesanan = $conn->query("SELECT COUNT(*) AS total FROM pesanan")->fetch_assoc()['total'];

// Ambil data pesanan
$pesanan_result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - FansGrow.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #0b0b0b;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      margin: 0;
    }

    header {
      background-color: #ff8c42;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 600;
      font-size: 20px;
    }

    header a {
      background: #111;
      color: white;
      padding: 8px 15px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    }

    header a:hover {
      background: #ff5c00;
    }

    .dashboard {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    .card {
      background-color: #1a1a1a;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.4);
      text-align: center;
      width: 250px;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
      color: #fff;
    }

    .card:hover {
      transform: translateY(-5px);
      background-color: #2b2b2b;
      box-shadow: 0 0 15px rgba(255, 140, 66, 0.6);
    }

    h3 {
      color: #ff8c42;
      margin-bottom: 10px;
    }

    p {
      font-size: 28px;
      font-weight: 600;
      margin: 0;
    }

    .content {
      width: 90%;
      margin: 50px auto;
      background: #1a1a1a;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(255, 140, 66, 0.3);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      color: #fff;
    }

    th, td {
      border-bottom: 1px solid #333;
      padding: 10px 15px;
      text-align: left;
    }

    th {
      background-color: #ff8c42;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #222;
    }

    tr:hover {
      background-color: #2b2b2b;
    }

    footer {
      text-align: center;
      margin: 40px 0 20px;
      color: #999;
      font-size: 0.9em;
    }

    h2.section-title {
      color: #ff8c42;
      margin-bottom: 15px;
    }

    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body>

  <header>
    <div>Dashboard Admin</div>
    <div>
      Halo, <?= htmlspecialchars($_SESSION['admin_username']); ?> 👋 
      <a href="logout.php">Logout</a>
    </div>
  </header>

  <!-- CARD DASHBOARD -->
  <div class="dashboard">
    <a href="admin_pesan.php" class="card">
      <h3>Total Pesan</h3>
      <p><?= $total_pesan; ?></p>
    </a>

    <a href="#pesanan-section" class="card">
      <h3>Total Pesanan</h3>
      <p><?= $total_pesanan; ?></p>
    </a>

    <div class="card">
      <h3>Total Admin</h3>
      <p><?= $total_admin; ?></p>
    </div>

    <a href="admin_log.php" class="card">
      <h3>Log Aktivitas</h3>
      <p><?= $total_log; ?></p>
    </a>
  </div>

  <!-- DAFTAR PESANAN -->
  <div class="content" id="pesanan-section">
    <h2 class="section-title">📦 Daftar Pesanan FansGrow.id</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Username Akun</th>
          <th>Email</th>
          <th>Total (Rp)</th>
          <th>Tanggal Pesan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($pesanan_result->num_rows > 0):
          while ($row = $pesanan_result->fetch_assoc()):
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['username_akun']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= number_format($row['total'], 0, ',', '.') ?></td>
            <td><?= $row['tanggal_pesan'] ?></td>
          </tr>
        <?php
          endwhile;
        else:
          echo "<tr><td colspan='6' style='text-align:center;'>Belum ada pesanan.</td></tr>";
        endif;
        ?>
      </tbody>
    </table>
  </div>

  <footer>
    © <?= date('Y'); ?> FansGrow.id | Panel Admin
  </footer>

</body>
</html>
