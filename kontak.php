<?php
// koneksi ke database
$conn = new mysqli("localhost", "root", "", "fansgrow");

// cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// proses form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pesan = $_POST['pesan'];

  $sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>
      alert('Pesan berhasil dikirim! Anda bisa mengonfirmasi melalui WhatsApp.');
      window.location='kontak.php';
    </script>";
  } else {
    echo "<script>alert('Gagal mengirim pesan.');</script>";
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak Kami - FansGrow.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0b0b0b;
      color: #fff;
      margin: 0;
      padding: 0;
    }

    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 50px;
      background-color: #111;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .logo h2 {
      color: #ff8c42;
      margin: 0;
    }

    .title {
      text-align: center;
      color: #ffffff;
      font-size: 1.5em;
      font-weight: 600;
      letter-spacing: 1px;
      flex: 1;
    }

    .back-btn {
      background-color: #ff8c42;
      color: white;
      border: none;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      font-size: 1.4em;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: 0.3s ease;
    }

    .back-btn:hover {
      background-color: #ffa35f;
      transform: translateY(-3px);
    }

    .contact-section {
      max-width: 900px;
      margin: 60px auto;
      padding: 0 20px;
      text-align: center;
    }

    .contact-section h2 {
      color: #ff8c42;
      margin-bottom: 10px;
    }

    .contact-section p {
      color: #ccc;
      font-size: 1em;
      margin-bottom: 40px;
    }

    .contact-form {
      background-color: #1a1a1a;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      text-align: left;
    }

    .contact-form label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #ff8c42;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: none;
      border-radius: 8px;
      background-color: #111;
      color: #fff;
      font-size: 1em;
      resize: none;
    }

    .contact-form button {
      background-color: #ff8c42;
      border: none;
      color: white;
      padding: 12px 25px;
      font-size: 1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
    }

    .contact-form button:hover {
      background-color: #ffa35f;
      transform: translateY(-3px);
    }

    .whatsapp-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #25D366;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 12px 25px;
      font-size: 1em;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
      margin-top: 20px;
    }

    .whatsapp-btn:hover {
      background-color: #1ebc57;
      transform: translateY(-3px);
    }

    .whatsapp-btn img {
      width: 22px;
      margin-right: 10px;
    }
    
    /* Responsive adjustments for small screens */
    @media (max-width: 480px) {
      header { padding: 12px 14px; }
      .title { font-size: 1.1em; }
      .contact-section { margin: 30px 12px; }
      .contact-form { padding: 18px; }
      .contact-form input, .contact-form textarea { padding: 10px; font-size: 0.95em; }
      .back-btn { width: 40px; height: 40px; }
      .whatsapp-btn { padding: 10px 16px; font-size: 0.95em; }
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <h2>FansGrow.id</h2>
    </div>
    <div class="title">Kontak Kami</div>
    <a href="index.html" class="back-btn" title="Kembali">&#8592;</a>
  </header>

  <section class="contact-section">
    <h2>Hubungi Kami</h2>
    <p>Isi formulir di bawah ini untuk mengirim pesan kepada tim FansGrow atau konfirmasi pesanan Anda.</p>

    <div class="contact-form">
      <form method="POST" action="">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Alamat Email</label>
        <input type="email" id="email" name="email" required>

        <label for="pesan">Pesan Anda</label>
        <textarea id="pesan" name="pesan" rows="5" required></textarea>

        <button type="submit">Kirim Pesan</button>
      </form>

      <!-- Tombol WhatsApp -->
      <a 
        href="https://wa.me/6282141580538?text=Halo%20FansGrow!%20Saya%20ingin%20konfirmasi%20pesanan%20atau%20mengajukan%20pertanyaan." 
        target="_blank" 
        class="whatsapp-btn">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"> 
        Hubungi via WhatsApp
      </a>
    </div>
  </section>
</body>
</html>
