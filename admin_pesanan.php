<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Pesanan | FansGrow.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #0f0b0b;
      color: white;
      padding: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: rgba(255,255,255,0.1);
      border-radius: 10px;
      overflow: hidden;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background: #ff6600;
      color: white;
    }
    tr:nth-child(even) {
      background: rgba(255,255,255,0.05);
    }
  </style>
</head>
<body>
  <h2>📋 Daftar Pesanan FansGrow.id</h2>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Username Akun</th>
      <th>Email</th>
      <th>Total (Rp)</th>
      <th>Tanggal Pesan</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['username_akun']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= number_format($row['total'], 0, ',', '.') ?></td>
        <td><?= $row['tanggal_pesan'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
