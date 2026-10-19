<?php
include 'koneksi.php';

$id_mapel   = (int) $_POST['id_mapel'];
$nama_mapel = $_POST['nama_mapel'];
$nama_siswa = $_POST['nama_siswa'];
$nama_guru  = $_POST['nama_guru'];

$stmt = mysqli_prepare($koneksi, "UPDATE mapel SET nama_mapel=?, nama_siswa=?, nama_guru=? WHERE id_mapel=?");
mysqli_stmt_bind_param($stmt, "sssi", $nama_mapel, $nama_siswa, $nama_guru, $id_mapel);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal update data: " . mysqli_error($koneksi);
    echo "<br><a href='index.php'>Kembali</a>";
}
?>
