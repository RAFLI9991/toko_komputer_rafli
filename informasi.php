<?php
// Membuat koneksi ke database MySQL
// Parameter: server = localhost, user = root, password = "", database = toko_komputer_rafli
$koneksi = new mysqli("localhost", "root", "", "toko_komputer_rafli");

// Mengambil data dari tabel tb_perangkat
$data = $koneksi->query("SELECT * FROM tb_perangkat");

// Mengecek apakah URL mengandung parameter "print=true", jika iya, akan mencetak halaman
$isPrint = isset($_GET['print']) && $_GET['print'] == 'true';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi Perangkat Keras</title>
  <style>
    /* Menata tampilan halaman secara keseluruhan */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 20px;
    }

    /* Menata judul halaman */
    h2 {
      text-align: center;
      color: #333;
    }

    /* Menata tabel untuk menampilkan data perangkat keras */
    table {
      width: 95%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 16px;
      text-align: left;
      vertical-align: top;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    img {
      border-radius: 6px;
    }

    /* Menata tombol hapus */
    .hapus-btn {
      background-color: #dc3545;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .hapus-btn:hover {
      background-color: #c82333;
    }

    /* Menata kolom harga supaya tetap berada dalam satu baris */
    .harga {
      white-space: nowrap;
    }

    /* Menata tombol untuk kembali ke beranda */
    .button-container {
      text-align: center;
      margin-top: 30px;
    }

    .button-container button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      transition: background-color 0.3s;
      margin: 5px;
    }

    .button-container button:hover {
      background-color: #218838;
    }

    /* Mengatur tampilan saat mencetak halaman */
    @media print {
      .hapus-btn,
      .button-container {
        display: none !important; /* Menyembunyikan tombol hapus dan tombol kembali saat dicetak */
      }
    }
  </style>
</head>
<body>

<h2>Informasi Perangkat Keras</h2>

<table border="0">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Deskripsi</th>
    <th>Harga</th>
    <th>Gambar</th>
    <?php if (!$isPrint): ?>  <!-- Jika bukan untuk cetak, tampilkan kolom aksi -->
      <th>Aksi</th>
    <?php endif; ?>
  </tr>

  <!-- Mengambil data perangkat keras dan menampilkannya dalam tabel -->
  <?php $no = 1; while($row = $data->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td> <!-- Menampilkan nomor urut -->
      <td><?= $row['nama'] ?></td> <!-- Menampilkan nama perangkat -->
      <td><?= $row['deskripsi'] ?></td> <!-- Menampilkan deskripsi perangkat -->
      <td class="harga">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td> <!-- Menampilkan harga perangkat -->
      <td><img src="gambar/<?= $row['gambar'] ?>" width="100"></td> <!-- Menampilkan gambar perangkat -->
      <?php if (!$isPrint): ?> <!-- Jika bukan untuk cetak, tampilkan tombol hapus -->
        <td>
          <form action="hapus.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            <input type="hidden" name="id" value="<?= $row['id'] ?>"> <!-- Mengirimkan id perangkat yang akan dihapus -->
            <button type="submit" class="hapus-btn">Hapus</button> <!-- Tombol hapus -->
          </form>
        </td>
      <?php endif; ?>
    </tr>
  <?php endwhile; ?>
</table>

<?php if (!$isPrint): ?> <!-- Jika bukan untuk cetak, tampilkan tombol kembali ke beranda -->
  <div class="button-container">
    <button onclick="window.location.href='index.php'">Kembali ke Beranda</button>
  </div>
<?php endif; ?>

<?php if ($isPrint): ?> <!-- Jika halaman untuk dicetak, otomatis mencetak -->
  <script>
    window.onload = () => {
      window.print();  // Fungsi untuk memulai proses pencetakan setelah halaman dimuat
    };
  </script>
<?php endif; ?>

</body>
</html>
