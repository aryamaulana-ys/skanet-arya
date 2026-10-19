```php
<?php
include 'koneksi.php';

$id = $_GET['id_nilai'];

$query = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_nilai='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data nilai tidak ditemukan!";
    exit;
}

if (isset($_POST['update'])) {

    $nis = $_POST['nis'];
    $id_mapel = $_POST['id_mapel'];
    $nip = $_POST['nip'];
    $nilai = $_POST['nilai'];

    $update = mysqli_query($koneksi, "UPDATE nilai SET
        nis='$nis',
        id_mapel='$id_mapel',
        nip='$nip',
        nilai='$nilai'
        WHERE id_nilai='$id'
    ");

    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Nilai - Sistem Akademik</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(59, 130, 246, 0.18),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(245, 158, 11, 0.10),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #0b1730,
                    #17365f,
                    #243b55
                );

            color: #111827;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar-akademik {
            height: 70px;
            background: #0b1328;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 8%;

            box-shadow:
                0 3px 15px rgba(0, 0, 0, 0.25);
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo i {
            color: #f59e0b;
            margin-right: 8px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .menu a {
            color: #d1d5db;
            text-decoration: none;

            padding: 11px 14px;

            border-radius: 8px;

            font-size: 15px;
            font-weight: 600;

            transition: 0.2s;
        }

        .menu a:hover {
            background: #1e293b;
            color: white;
        }

        .menu .active {
            background: #2563eb;
            color: white;
        }

        .menu .logout {
            background: #ef2929;
            color: white;
            margin-left: 5px;
        }

        .menu .logout:hover {
            background: #dc2626;
        }

        /* =========================
           CONTAINER
        ========================= */

        .main-container {
            width: 85%;
            max-width: 1000px;

            margin: 38px auto;

            background: rgba(255, 255, 255, 0.98);

            border-radius: 22px;

            padding: 40px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.25);
        }

        /* =========================
           HEADER
        ========================= */

        .page-icons {
            font-size: 38px;
            margin-bottom: 8px;
        }

        .page-icons .chart {
            color: #3b82f6;
            margin-right: 8px;
        }

        .page-icons .graduation {
            color: #f59e0b;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;

            color: #0f172a;

            margin: 0;
        }

        .title-line {
            width: 70px;
            height: 4px;

            background: #f59e0b;

            border-radius: 10px;

            margin-top: 10px;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 30px;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 28px;

            background: #ffffff;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, 0.06);
        }

        .form-label {
            font-weight: 700;
            color: #1e293b;

            margin-bottom: 8px;
        }

        .form-control {
            height: 46px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            padding: 10px 13px;

            font-size: 15px;

            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-control:disabled {
            background: #f1f5f9;
            color: #64748b;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-simpan {
            background: #2563eb;
            color: white;

            border: none;

            padding: 11px 20px;

            border-radius: 8px;

            font-weight: 700;

            transition: 0.2s;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
            color: white;

            transform: translateY(-1px);
        }

        .btn-kembali {
            background: #64748b;
            color: white;

            border: none;

            padding: 11px 20px;

            border-radius: 8px;

            font-weight: 700;

            text-decoration: none;

            display: inline-block;

            transition: 0.2s;
        }

        .btn-kembali:hover {
            background: #475569;
            color: white;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;

            color: #64748b;

            margin-top: 35px;

            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .navbar-akademik {
                padding: 0 4%;
            }

            .menu a {
                padding: 9px 8px;
                font-size: 13px;
            }

            .main-container {
                width: 92%;
                padding: 25px;
            }

        }

        @media (max-width: 650px) {

            .navbar-akademik {
                height: auto;
                padding: 15px;

                flex-direction: column;
                gap: 15px;
            }

            .menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .page-title {
                font-size: 28px;
            }

            .main-container {
                margin: 20px auto;
            }

        }

    </style>
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar-akademik">

    <a href="index.php" class="logo">
        <i class="fa-solid fa-graduation-cap"></i>
        Sistem Akademik
    </a>

    <div class="menu">

        <a href="../dashboard/index.php">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="../siswa/index.php">
            <i class="fa-solid fa-users"></i>
            Siswa
        </a>

        <a href="../guru/index.php">
            <i class="fa-solid fa-id-card"></i>
            Guru
        </a>

        <a href="../mapel/index.php">
            <i class="fa-solid fa-book"></i>
            Mapel
        </a>

        <a href="index.php" class="active">
            <i class="fa-solid fa-chart-column"></i>
            Nilai
        </a>

        <a href="../logout.php" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </div>

</nav>


<!-- =========================
     MAIN CONTENT
========================= -->

<div class="main-container">

    <div class="page-icons">
        <span class="chart">
            <i class="fa-solid fa-chart-column"></i>
        </span>

        <span class="graduation">
            <i class="fa-solid fa-graduation-cap"></i>
        </span>
    </div>

    <h1 class="page-title">
        Edit Nilai Siswa
    </h1>

    <div class="title-line"></div>

    <p class="subtitle">
        Perbarui data nilai akademik siswa
    </p>


    <!-- FORM -->

    <div class="form-card">

        <form method="POST">

            <div class="row">

                <!-- ID NILAI -->

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        ID Nilai
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($data['id_nilai']); ?>"
                        disabled
                    >

                </div>


                <!-- NILAI -->

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Nilai
                    </label>

                    <input
                        type="number"
                        name="nilai"
                        class="form-control"
                        value="<?= htmlspecialchars($data['nilai']); ?>"
                        min="0"
                        max="100"
                        required
                    >

                </div>


                <!-- NIS -->

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        NIS Siswa
                    </label>

                    <input
                        type="text"
                        name="nis"
                        class="form-control"
                        value="<?= htmlspecialchars($data['nis']); ?>"
                        required
                    >

                </div>


                <!-- ID MAPEL -->

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        ID Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        name="id_mapel"
                        class="form-control"
                        value="<?= htmlspecialchars($data['id_mapel']); ?>"
                        required
                    >

                </div>


                <!-- NIP -->

                <div class="col-md-12 mb-4">

                    <label class="form-label">
                        NIP Guru
                    </label>

                    <input
                        type="text"
                        name="nip"
                        class="form-control"
                        value="<?= htmlspecialchars($data['nip']); ?>"
                        required
                    >

                </div>

            </div>


            <!-- BUTTON -->

            <div class="d-flex gap-2 mt-2">

                <button
                    type="submit"
                    name="update"
                    class="btn-simpan"
                >
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>

                <a
                    href="index.php"
                    class="btn-kembali"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>

            </div>

        </form>

    </div>


    <!-- FOOTER -->

    <div class="footer">
        © 2026 Sistem Akademik Sekolah • Edit Nilai
    </div>

</div>

</body>
</html>
```
