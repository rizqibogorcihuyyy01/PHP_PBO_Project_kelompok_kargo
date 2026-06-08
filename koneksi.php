<?php
// Konfigurasi Database
$host     = "localhost";
$username = "root";             // Sesuaikan dengan username MySQL Anda (bawaan biasanya 'root')
$password = "";                 // Sesuaikan dengan password MySQL Anda (bawaan biasanya kosong)
$database = "db_kargo_ekspedisi"; // Nama database sesuai SQL Dump Anda

// Agar kompatibel dengan PHP 8.1+ dan bisa menangkap exception jika database belum ada
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi ke database
    $koneksi = new mysqli($host, $username, $password, $database);
    
    // Mengatur charset ke utf8mb4 agar sesuai dengan struktur tabel Anda
    $koneksi->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    // Menangkap error koneksi (misal database belum diimport)
    die("<div style='color: red; padding: 20px; font-family: sans-serif; background: #ffebee; border-left: 5px solid #f44336; border-radius: 5px; margin: 20px;'>
            <strong>❌ Koneksi ke database gagal:</strong> " . $e->getMessage() . "<br><br>
            <em>Pesan ini kemungkinan muncul karena database <b>" . $database . "</b> belum dibuat atau file SQL dump belum diimport. Silakan jalankan import file <b>db_kargo_ekspedisi.sql</b> terlebih dahulu.</em>
         </div>");
}

// Koneksi berhasil (opsional: bisa dihapus jika sudah masuk tahap produksi)
// echo "Koneksi berhasil!"; 
?>