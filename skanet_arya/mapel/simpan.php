<?php
include 'koneksi.php';

$id_mapel   = (int) $_POST['id_mapel'];
$nama_mapel = $_POST['nama_mapel'];
$nama_siswa = $_POST['nama_siswa'];
$nama_guru  = $_POST['nama_guru'];

$stmt = mysqli_prepare($koneksi, "INSERT INTO mapel (id_mapel, nama_mapel, nama_siswa, nama_guru) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "isss", $id_mapel, $nama_mapel, $nama_siswa, $nama_guru);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    echo "<br><a href='tambah.php'>Kembali</a>";
}
?>
