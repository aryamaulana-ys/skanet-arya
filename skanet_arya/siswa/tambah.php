<?php
include "koneksi.php";
session_start();
if($_SESSION['status'] <> "sukses"){
    header('location:../logou.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa - Elegan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: #212529; /* Warna gelap maskulin */
            color: #ffffff;
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
            padding: 1.2rem;
        }

        .form-label {
            font-weight: 600;
            color: #343a40;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .btn-secondary {
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="fa-solid fa-user-plus me-2"></i>Tambah Data Siswa</h4>
                </div>
                <div class="card-body p-4">
                    <form action="simpan.php" method="POST">
                        
                        <!-- NIS -->
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required autocomplete="off">
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required autocomplete="off">
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>