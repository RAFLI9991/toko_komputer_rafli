<?php
// Membuat koneksi ke database MySQL
$koneksi = new mysqli("localhost", "root", "", "toko_komputer_rafli");

// Mengecek apakah permintaan yang dikirim menggunakan metode POST dan apakah parameter 'id' ada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Mengambil dan membersihkan nilai 'id' dari input POST untuk mencegah serangan SQL Injection
    $id = $koneksi->real_escape_string($_POST['id']);

    // Menyusun query untuk menghapus data dari tabel 'tb_perangkat' berdasarkan ID
    $query = "DELETE FROM tb_perangkat WHERE id='$id'";

    // Menjalankan query dan mengecek apakah penghapusan berhasil
    if ($koneksi->query($query)) {
        // Jika berhasil, arahkan kembali ke halaman utama (index.php)
        header("Location: index.php"); // Ganti sesuai halaman utama kamu
        exit();  // Menghentikan eksekusi lebih lanjut setelah pengalihan
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal menghapus data: " . $koneksi->error;
    }
}
?>
