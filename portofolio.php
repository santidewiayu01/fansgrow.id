<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio - FansGrow.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0b0b0b;
      color: #fff;
      overflow-x: hidden;
    }

    header {
      background-color: #111;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 60px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .logo h2 {
      color: #ff8c42;
    }

    nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    nav a:hover {
      color: #ff8c42;
    }

    .hero {
      text-align: center;
      padding: 80px 20px;
      background: linear-gradient(180deg, #111, #0b0b0b);
    }

    .hero h1 {
      font-size: 2.5em;
      color: #ff8c42;
      margin-bottom: 15px;
    }

    .hero p {
      color: #ccc;
      font-size: 1.1em;
      max-width: 700px;
      margin: 0 auto;
    }

    .portfolio-section {
      max-width: 1200px;
      margin: 60px auto;
      padding: 0 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
    }

    .card {
      background-color: #1a1a1a;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.4);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(255,140,66,0.2);
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-content {
      padding: 20px;
      text-align: center;
    }

    .card-content h3 {
      color: #ff8c42;
      margin-bottom: 10px;
    }

    .card-content p {
      color: #ccc;
      font-size: 0.95em;
    }

    footer {
      text-align: center;
      padding: 25px;
      color: #888;
      font-size: 0.9em;
      border-top: 1px solid rgba(255,255,255,0.1);
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">
      <h2>FansGrow.id</h2>
    </div>
    <nav>
      <a href="index.html">Beranda</a>
      <a href="portofolio.php">Portofolio</a>
      <a href="kontak.php">Kontak</a>
    </nav>
  </header>

  <section class="hero">
    <h1>Portofolio FansGrow.id</h1>
    <p>Kami telah membantu banyak kreator, bisnis, dan brand untuk meningkatkan engagement dan kehadiran digital mereka melalui strategi pertumbuhan yang efektif.</p>
  </section>

  <section class="portfolio-section">
    <div class="card">
      <img src="images.jpeg" alt="Instagram Growth">
      <div class="card-content">
        <h3>Instagram Growth</h3>
        <p>Meningkatkan followers dan engagement akun klien hingga 300% dengan strategi target audiens yang tepat.</p>
      </div>
    </div>

    <div class="card">
      <img src="what-is-cms.jpg" alt="Content Management">
      <div class="card-content">
        <h3>Content Management</h3>
        <p>Mengelola lebih dari 50 akun bisnis dengan jadwal posting otomatis dan analitik performa yang lengkap.</p>
      </div>
    </div>

    <div class="card">
      <img src="01K21PNM1GEC2GC6SPPKYNJA5A.jpeg" alt="Brand Collaboration">
      <div class="card-content">
        <h3>Brand Collaboration</h3>
        <p>Berhasil menjembatani kerja sama antara brand dan influencer untuk meningkatkan awareness produk.</p>
      </div>
    </div>

    <div class="card">
      <img src="    photo-1515378791036-0648a3ef77b2.avif" alt="Digital Campaign">
      <div class="card-content">
        <h3>Digital Campaign</h3>
        <p>Kampanye digital lintas platform yang berhasil mencapai lebih dari 1 juta impresi dalam waktu 2 minggu.</p>
      </div>
    </div>
  </section>

  <footer>
    © 2025 FansGrow.id | Meningkatkan Kehadiran Digital Anda
  </footer>

</body>
</html>
