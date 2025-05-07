<?php
// Mendeklarasikan variabel untuk mengatur parameter koneksi ke database
$host = "localhost";  // Nama host tempat database berada
$user = "root";       // Username untuk login ke database
$pass = "";           // Password untuk login ke database (kosongkan jika tidak ada)
$db   = "toko_komputer_rafli"; // Nama database yang akan digunakan (ganti dengan nama database yang sesuai)

// Membuat koneksi ke database MySQL menggunakan mysqli_connect
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    // Jika gagal, tampilkan pesan kesalahan dan hentikan proses
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
