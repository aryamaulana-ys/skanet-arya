<?php
include 'koneksi.php';

$id_mapel = (int) $_GET['id_mapel'];

$stmt = mysqli_prepare($koneksi, "DELETE FROM mapel WHERE id_mapel = ?");
mysqli_stmt_bind_param($stmt, "i", $id_mapel);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>
