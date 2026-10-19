<?php
include "koneksi.php";

// Pastikan data dikirim lewat form
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nip    = trim($_POST['nip'] ?? '');
$nama   = trim($_POST['nama'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');

// Validasi kosong
if ($nip === '' || $nama === '' || $alamat === '') {
    echo "<script>alert('Semua data wajib diisi!'); history.back();</script>";
    exit;
}

// Cek apakah NIP sudah ada
$cek = mysqli_prepare($koneksi, "SELECT nip FROM guru WHERE nip = ?");
mysqli_stmt_bind_param($cek, "s", $nip);
mysqli_stmt_execute($cek);
mysqli_stmt_store_result($cek);

if (mysqli_stmt_num_rows($cek) > 0) {
    echo "<script>alert('NIP $nip sudah terdaftar!'); history.back();</script>";
    exit;
}
mysqli_stmt_close($cek);

// Simpan data (prepared statement, aman dari SQL Injection)
$stmt = mysqli_prepare($koneksi, "INSERT INTO guru (nip, nama, alamat) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $nip, $nama, $alamat);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: index.php');
exit;
?>