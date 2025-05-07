<!DOCTYPE html> <!-- Menandakan bahwa ini adalah dokumen HTML5 -->
<html lang="id"> <!-- Bahasa halaman adalah Bahasa Indonesia -->
<head>
  <meta charset="UTF-8"> <!-- Mengatur karakter encoding UTF-8 -->
  <title>Beranda - Toko Komputer</title> <!-- Judul halaman di tab browser -->
  <style>
    /* CSS dimulai */

    * {
      box-sizing: border-box; /* Padding dan border masuk ke perhitungan lebar/tinggi */
      margin: 0; /* Hilangkan margin default */
      padding: 0; /* Hilangkan padding default */
    }

    body {
      font-family: Arial, sans-serif; /* Jenis huruf Arial */
      font-size: 18px; /* Ukuran teks 18px */
      background-color: #f0f0f0; /* Warna latar belakang abu terang */
      color: #333; /* Warna teks abu gelap */
      height: 100vh; /* Tinggi halaman 100% dari tinggi layar */
      display: flex; /* Gunakan flexbox */
      justify-content: center; /* Tengahkan secara horizontal */
      align-items: center; /* Tengahkan secara vertikal */
    }

    .container {
      text-align: center; /* Semua isi ditengah */
      background-color: #fff; /* Warna latar putih */
      padding: 40px; /* Ruang dalam 40px */
      border-radius: 12px; /* Sudut melengkung */
      box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* Bayangan lembut */
      width: 90%; /* Lebar 90% dari layar */
      max-width: 400px; /* Maksimum lebar 400px */
    }

    h1 {
      margin-bottom: 30px; /* Jarak bawah 30px dari elemen lain */
      font-size: 28px; /* Ukuran teks besar */
      color: #333; /* Warna teks abu tua */
    }

    .button-container {
      display: flex; /* Flexbox */
      flex-direction: column; /* Ditata secara vertikal */
      gap: 15px; /* Jarak antar tombol 15px */
    }

    .btn {
      padding: 12px; /* Ruang dalam tombol */
      font-size: 16px; /* Ukuran teks tombol */
      color: #fff; /* Warna teks putih */
      background-color: #007bff; /* Latar tombol biru */
      border: none; /* Tanpa border */
      border-radius: 6px; /* Sudut membulat */
      text-decoration: none; /* Hilangkan garis bawah */
      transition: background-color 0.3s; /* Efek transisi saat hover */
    }

    .btn:hover {
      background-color: #0056b3; /* Warna biru lebih gelap saat hover */
    }

    /* CSS selesai */
  </style>
</head>
<body>
  <div class="container"> <!-- Container utama -->
    <h1>Selamat Datang di Toko Komputer Rafli</h1> <!-- Judul halaman -->
    <div class="button-container"> <!-- Pembungkus tombol-tombol -->
      
      <!-- Tombol ke halaman input data -->
      <a href="input.php" class="btn">Input Data</a>
      
      <!-- Tombol ke halaman informasi perangkat keras -->
      <a href="informasi.php" class="btn">Informasi Perangkat Keras</a>
      
      <!-- Tombol untuk download brosur dalam bentuk PDF -->
      <a href="informasi.php?print=true" class="btn" target="_blank">Download Brosur (PDF)</a>
    </div>
  </div>
</body>
</html>
