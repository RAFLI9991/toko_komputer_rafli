<?php
// Mengecek apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Membuat koneksi ke database MySQL
  // Format: new mysqli(host, username, password, nama_database)
  $koneksi = new mysqli("localhost", "root", "", "toko_komputer_rafli");

  // Menyimpan data yang dikirim dari form ke dalam variabel
  $nama = $_POST['nama']; // Menyimpan inputan nama
  $deskripsi = $_POST['deskripsi']; // Menyimpan inputan deskripsi
  $harga = $_POST['harga']; // Menyimpan inputan harga

  // Mengambil nama file gambar yang diunggah
  $gambar = $_FILES['gambar']['name'];

  // Menentukan lokasi folder tempat menyimpan gambar
  $lokasi = "gambar/" . $gambar;

  // Memindahkan file gambar dari folder sementara ke folder "gambar/"
  move_uploaded_file($_FILES['gambar']['tmp_name'], $lokasi);

  // Menyimpan data ke dalam tabel tb_perangkat di database
  $koneksi->query("INSERT INTO tb_perangkat (nama, deskripsi, harga, gambar) 
                   VALUES ('$nama', '$deskripsi', '$harga', '$gambar')");

  // Menampilkan pesan bahwa data berhasil disimpan
  echo "<div class='pesan'>Data berhasil disimpan! <a href='index.php'>Kembali</a></div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"> <!-- Mengatur karakter encoding halaman ke UTF-8 -->
  <title>Form Input Perangkat Keras</title> <!-- Judul halaman yang muncul di tab browser -->
  <style>
    /* Mengatur gaya seluruh halaman */
    body {
      font-family: Arial, sans-serif; /* Menggunakan font Arial */
      background-color: #f4f4f4; /* Warna latar belakang */
      padding: 20px; /* Jarak isi dari tepi halaman */
    }

    /* Gaya untuk judul */
    h2 {
      text-align: center; /* Teks berada di tengah */
      font-size: 28px; /* Ukuran huruf */
      color: #333; /* Warna teks */
    }

    /* Gaya untuk form */
    form {
      background: white; /* Warna latar form */
      max-width: 600px; /* Lebar maksimum form */
      margin: auto; /* Tengah halaman */
      padding: 30px; /* Ruang dalam form */
      border-radius: 10px; /* Sudut membulat */
      box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Bayangan form */
    }

    /* Gaya untuk label form */
    label {
      font-weight: bold; /* Teks tebal */
      display: block; /* Baris baru */
      margin-bottom: 5px; /* Jarak bawah */
      margin-top: 15px; /* Jarak atas */
    }

    /* Gaya untuk input teks, angka, file, dan textarea */
    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
      width: 100%; /* Lebar penuh */
      padding: 10px; /* Ruang dalam */
      font-size: 16px; /* Ukuran teks */
      margin-top: 5px; /* Jarak atas */
      border: 1px solid #ccc; /* Garis abu-abu */
      border-radius: 5px; /* Sudut membulat */
    }

    /* Gaya untuk tombol submit */
    input[type="submit"] {
      background-color: #007BFF; /* Warna tombol biru */
      color: white; /* Warna teks putih */
      padding: 12px 20px; /* Ruang dalam tombol */
      margin-top: 20px; /* Jarak atas */
      border: none; /* Tanpa garis tepi */
      font-size: 16px; /* Ukuran teks */
      border-radius: 5px; /* Sudut membulat */
      cursor: pointer; /* Ubah kursor saat diarahkan */
    }

    /* Gaya saat tombol submit di-hover */
    input[type="submit"]:hover {
      background-color: #0056b3; /* Warna biru tua saat mouse diarahkan */
    }

    /* Gaya untuk pesan konfirmasi */
    .pesan {
      text-align: center; /* Teks tengah */
      background-color: #d4edda; /* Warna hijau muda */
      color: #155724; /* Warna teks hijau tua */
      padding: 10px; /* Ruang dalam */
      border-radius: 5px; /* Sudut membulat */
      margin: 10px auto; /* Jarak dan posisi tengah */
      max-width: 600px; /* Lebar maksimum */
    }
  </style>
</head>
<body>

<!-- Judul halaman yang tampil di bagian isi -->
<h2>Form Input Perangkat Keras</h2>

<!-- Form input data perangkat -->
<form method="post" enctype="multipart/form-data"> <!-- enctype wajib agar bisa upload file -->

  <label>Nama:</label> <!-- Label input nama -->
  <input type="text" name="nama" required> <!-- Input teks nama (wajib diisi) -->

  <label>Deskripsi:</label> <!-- Label input deskripsi -->
  <textarea name="deskripsi" rows="5" required></textarea> <!-- Textarea untuk deskripsi (wajib) -->

  <label>Harga:</label> <!-- Label input harga -->
  <input type="number" name="harga" required> <!-- Input angka harga (wajib) -->

  <label>Gambar:</label> <!-- Label input gambar -->
  <input type="file" name="gambar" required> <!-- Input upload file gambar (wajib) -->

  <input type="submit" value="Simpan"> <!-- Tombol kirim form -->
</form>

</body>
</html>
