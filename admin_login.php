<?php
session_start();
require 'db.php';
require 'log_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $conn->prepare("SELECT * FROM admin WHERE username = ?");
  $query->bind_param("s", $username);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
      $_SESSION['admin_id'] = $row['id'];
      $_SESSION['admin_username'] = $row['username'];
      $_SESSION['admin_role'] = $row['role'];
      $_SESSION['admin_logged_in'] = true;

      // Catat log login
      catat_log($row['id'], $row['username'], 'Login ke sistem');

      header("Location: admin_dashboard.php");
      exit();
    } else {
      $error = "Password salah!";
    }
  } else {
    $error = "Username tidak ditemukan!";
  }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - FansGrow.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  
  <style>
    body {
      background-color: #0b0b0b;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .login-box {
      background-color: #1a1a1a;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.4);
      width: 350px;
      text-align: center;
    }
    h2 {
      color: #ff8c42;
      margin-bottom: 20px;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background-color: #111;
      color: #fff;
      font-size: 1em;
    }
    button {
      background-color: #ff8c42;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 1em;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background-color: #ffa35f;
    }
    .error {
      color: #ff5c5c;
      font-size: 0.9em;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Admin</h2>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>
    </form>
  </div>
</body>
</html>
