<?php
$koneksi = mysqli_connect("localhost", "root", "", "skanet_arya");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
