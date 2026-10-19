<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] <> "sukses") {
    header('location:../logout.php');
    exit;
}

$nis = $_GET['nis'];

$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Siswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(
                135deg,
                #07111f,
                #102b49,
                #07111f
            );
            font-family: Arial, sans-serif;
            color: #172033;
        }

        /* CONTAINER */

        .container-main {
            max-width: 850px;
            margin: 55px auto;
            padding: 0 20px;
        }

        /* CARD */

        .edit-card {
            background: #ffffff;
            border-radius: 22px;
            padding: 40px;
            box-shadow: 0 18px 45px rgba(0,0,0,.35);
            position: relative;
            overflow: hidden;
        }

        .edit-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: rgba(20,115,230,.06);
            border-radius: 50%;
            right: -70px;
            top: -70px;
        }

        /* HEADER */

        .page-header {
            display: flex;
            align-items: center;
            gap: 18px;
            padding-bottom: 25px;
            margin-bottom: 30px;
            border-bottom: 1px solid #e5e8ec;
            position: relative;
        }

        .page-icon {
            width: 62px;
            height: 62px;
            background: #e7f1ff;
            color: #1769e0;
            border-radius: 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .page-header h1 {
            margin: 0;
            color: #101828;
            font-size: 32px;
            font-weight: 700;
        }

        .page-header p {
            margin: 6px 0 0;
            color: #7b8491;
        }

        /* FORM */

        .form-label {
            color: #252b35;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #d6dce3;
            border-radius: 10px;
            padding: 12px 15px;
            transition: .3s;
        }

        .form-control:focus {
            border-color: #1473e6;
            box-shadow: 0 0 0 3px rgba(20,115,230,.12);
        }

        .readonly {
            background: #f0f2f4;
            color: #6c757d;
        }

        textarea {
            resize: vertical;
        }

        /* BUTTON */

        .btn-simpan {
            background: #1473e6;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 11px 23px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-simpan:hover {
            background: #095abd;
            color: white;
            transform: translateY(-2px);
        }

        .btn-kembali {
            background: #edf0f3;
            color: #343a40;
            border: none;
            border-radius: 9px;
            padding: 11px 23px;
            font-weight: 600;
        }

        .btn-kembali:hover {
            background: #dfe3e7;
        }

        /* FOOTER */

        footer {
            text-align: center;
            color: #aeb9c7;
            font-size: 14px;
            padding-bottom: 30px;
        }

        /* RESPONSIVE */

        @media(max-width: 600px) {

            .container-main {
                margin: 25px auto;
            }

            .edit-card {
                padding: 25px;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .page-header p {
                font-size: 14px;
            }

            .d-flex {
                gap: 10px;
            }

            .btn-simpan,
            .btn-kembali {
                padding: 10px 15px;
            }
        }

    </style>
</head>

<body>

<div class="container-main">

    <div class="edit-card">

        <!-- HEADER -->

        <div class="page-header">

            <div class="page-icon">
                <i class="bi bi-person-gear"></i>
            </div>

            <div>
                <h1>Edit Data Siswa</h1>

                <p>
                    Perbarui informasi data siswa dengan benar.
                </p>
            </div>

        </div>


        <!-- FORM -->

        <form action="update.php" method="POST">

            <!-- NIS -->

            <div class="mb-4">

                <label class="form-label">
                    <i class="bi bi-card-text"></i>
                    NIS
                </label>

                <input
                    type="text"
                    class="form-control readonly"
                    name="nis"
                    value="<?php echo $data['nis']; ?>"
                    readonly
                >

                <small class="text-muted">
                    NIS tidak dapat diubah.
                </small>

            </div>


            <!-- NAMA -->

            <div class="mb-4">

                <label class="form-label">
                    <i class="bi bi-person-fill"></i>
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="nama"
                    value="<?php echo $data['nama']; ?>"
                    required
                >

            </div>


            <!-- ALAMAT -->

            <div class="mb-4">

                <label class="form-label">
                    <i class="bi bi-geo-alt-fill"></i>
                    Alamat
                </label>

                <textarea
                    class="form-control"
                    name="alamat"
                    rows="4"
                    required><?php echo $data['alamat']; ?></textarea>

            </div>


            <!-- BUTTON -->

            <div class="d-flex justify-content-between">

                <a href="index.php" class="btn btn-kembali">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

                <button type="submit" class="btn btn-simpan">

                    <i class="bi bi-save-fill"></i>
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>


<footer>

    <i class="bi bi-shield-check"></i>
    © 2026 Sistem Akademik • Data Siswa

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>