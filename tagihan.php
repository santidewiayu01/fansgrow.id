<?php
include 'db.php';

// Ambil data berdasarkan ID pesanan
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = $id");
$order = mysqli_fetch_assoc($result);
if (!$order) {
    die("Pesanan tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tagihan Pembayaran | FansGrow.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #0f0b0b;
      color: white;
      text-align: center;
      padding: 24px 16px;
      margin: 0;
    }

    /* Center the invoice box on larger screens, keep top-aligned on mobile */
    @media (min-width: 768px) {
      body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
      }
    }
    .invoice-box {
      display: block;
      margin: 14px auto;
      background: rgba(255,255,255,0.08);
      padding: 28px;
      border-radius: 15px;
      width: 100%;
      max-width: 640px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .invoice-box h2 {
      color: #ff6600;
    }
    .qris {
      /* Make QR large but constrained to invoice width */
      width: min(520px, 86vw);
      max-width: 100%;
      height: auto;
      margin: 18px auto;
      display: block;
      border-radius: 6px;
      background: #fff;
      padding: 8px;
      transition: none !important;
      -webkit-transition: none !important;
    }

    /* Make QR card and text larger and more prominent on small screens */
    @media (max-width: 768px) {
      body { padding: 18px 12px; }
      .invoice-box { padding: 20px; width: 100%; max-width: 520px; margin: 18px auto; }
      .qris { width: 92vw; padding: 8px; }
      h2 { font-size: 1.15em; }
      .invoice-box h3 { font-size: 1.05em; }
    }

    @media (max-width: 420px) {
      .invoice-box { padding: 12px; width: 98%; max-width: 420px; }
      .qris { width: 96vw; padding: 6px; }
      .back-btn { padding: 10px 14px; }
      .invoice-box p, .invoice-box strong { font-size: 1.0em; }
    }
    .back-btn {
      display: inline-block;
      text-decoration: none;
      background: #ff6600;
      color: white;
      padding: 10px 20px;
      border-radius: 25px;
      margin-top: 15px;
      font-weight: 600;
    }
    .back-btn:hover {
      background: #ffaa33;
    }
    /* Fullscreen QR overlay */
    .qr-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.85);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      padding: 20px;
    }
    .qr-overlay.show { display: flex; }
    .qr-overlay img { max-width: 98%; max-height: 98%; border-radius: 6px; background:#fff; padding:8px; }
    .qr-zoom-btn {
      display: inline-block;
      margin-top: 12px;
      background: #ff6600;
      color: white;
      padding: 8px 14px;
      border-radius: 20px;
      font-weight: 600;
      cursor: pointer;
      border: none;
    }
  </style>
</head>
<body>

  <h2>💳 Tagihan Pembayaran</h2>

  <div class="invoice-box">
    <p><strong>Nama:</strong> <?= htmlspecialchars($order['nama']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
    <p><strong>Total Pembayaran:</strong> Rp <?= number_format($order['total'], 0, ',', '.') ?></p>

    <h3>Scan QRIS untuk Membayar</h3>
    <!-- Ganti src dengan QRIS milikmu -->
    <div>
      <img src="qris.jpg" alt="QRIS" class="qris" id="qrisImg">
      <button class="qr-zoom-btn" id="zoomBtn">Perbesar QR</button>
    </div>
    <p><small>Setelah pembayaran, konfirmasi via WhatsApp admin.</small></p>

    <a href="index.html" class="back-btn">⬅ Kembali ke Beranda</a>
  </div>
  </div>

  <div class="qr-overlay" id="qrOverlay" aria-hidden="true">
    <img src="qris.jpg" alt="QRIS besar" id="qrOverlayImg">
  </div>

  <script>
    // Zoom overlay for QR: keeps QR readable regardless of layout shifts
    (function(){
      const zoomBtn = document.getElementById('zoomBtn');
      const overlay = document.getElementById('qrOverlay');
      const overlayImg = document.getElementById('qrOverlayImg');
      const q = document.getElementById('qrisImg');

      function openOverlay(){
        overlay.classList.add('show');
        overlay.setAttribute('aria-hidden', 'false');
        // ensure high-res image is used
        overlayImg.src = q.src;
      }
      function closeOverlay(){
        overlay.classList.remove('show');
        overlay.setAttribute('aria-hidden', 'true');
      }

      zoomBtn.addEventListener('click', openOverlay);
      overlay.addEventListener('click', closeOverlay);
      document.addEventListener('keydown', (e)=>{ if(e.key === 'Escape') closeOverlay(); });
    })();
  </script>

</body>
</html>
