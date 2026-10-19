
<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - Sistem Akademik</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        * {
            box-sizing: border-box;
        }


        /* =========================
           BODY
        ========================= */

        body {

            margin: 0;

            font-family: Arial, sans-serif;

            background:
                radial-gradient(
                    circle at top right,
                    rgba(25, 65, 100, .45),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #07101d,
                    #14283f
                );

            min-height: 100vh;

            color: #172033;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {

            background: #080d16;

            padding: 14px 0;

            box-shadow:
                0 5px 20px rgba(0,0,0,.35);

            border-bottom:
                1px solid rgba(255,255,255,.05);
        }


        .navbar-brand {

            color: white !important;

            font-size: 22px;

            font-weight: bold;
        }


        .navbar-brand i {

            color: #f0a500;

            margin-right: 8px;
        }


        .nav-link {

            color: #d8dee8 !important;

            font-weight: 600;

            padding: 9px 14px !important;

            margin: 0 2px;

            border-radius: 7px;

            transition: .25s;
        }


        .nav-link:hover {

            background: rgba(255,255,255,.08);

            color: white !important;
        }


        /* MENU SISWA AKTIF */

        .nav-link.active {

            background: #1264d9;

            color: white !important;

            box-shadow:
                0 4px 12px rgba(18,100,217,.35);
        }


        /* LOGOUT */

        .btn-logout {

            background: #dc2635;

            color: white;

            border: none;

            border-radius: 7px;

            padding: 9px 16px;

            font-weight: bold;

            margin-left: 10px;
        }


        .btn-logout:hover {

            background: #b91d2a;

            color: white;
        }


        /* USER */

        .user-login {

            color: #dce3ec;

            font-size: 14px;

            margin-left: 10px;
        }


        .user-login i {

            color: #f0a500;

            font-size: 17px;

            margin-right: 5px;
        }


        /* =========================
           CONTAINER
        ========================= */

        .main-container {

            max-width: 1250px;

            margin: 40px auto;

            padding: 0 20px;
        }


        /* =========================
           CARD UTAMA
        ========================= */

        .main-card {

            background: #ffffff;

            border-radius: 22px;

            padding: 38px;

            box-shadow:
                0 20px 50px rgba(0,0,0,.35);

            min-height: 550px;
        }


        /* =========================
           HEADER
        ========================= */

        .page-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 30px;
        }


        .page-title {

            font-size: 38px;

            font-weight: 700;

            color: #111827;

            margin: 0;
        }


        .page-title i {

            color: #f0a500;

            margin-right: 8px;
        }


        .yellow-line {

            width: 65px;

            height: 4px;

            background: #e9a400;

            border-radius: 10px;

            margin-top: 9px;
        }


        .page-description {

            color: #7d8794;

            margin-top: 12px;

            margin-bottom: 0;
        }


        /* =========================
           BUTTON TAMBAH
        ========================= */

        .btn-tambah {

            background: #1264d9;

            color: white;

            border: none;

            border-radius: 8px;

            padding: 11px 20px;

            font-weight: 600;

            box-shadow:
                0 5px 12px rgba(18,100,217,.25);
        }


        .btn-tambah:hover {

            background: #0d55bd;

            color: white;

            transform: translateY(-2px);
        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {

            border-radius: 12px;

            overflow: hidden;

            border: 1px solid #e2e6ea;

            margin-top: 15px;
        }


        .table {

            margin: 0;

            border: none;
        }


        .table thead th {

            background: #0d1119;

            color: white;

            font-weight: 600;

            padding: 15px 14px;

            border: 1px solid #303642;

            white-space: nowrap;
        }


        .table tbody td {

            padding: 14px;

            vertical-align: middle;

            border-color: #e4e7eb;

            color: #303946;
        }


        .table tbody tr {

            background: white;

            transition: .2s;
        }


        .table tbody tr:hover {

            background: #f4f7fb;
        }


        /* =========================
           BUTTON EDIT
        ========================= */

        .btn-edit {

            background: #f0a000;

            color: white;

            border: none;

            border-radius: 7px;

            padding: 7px 13px;

            font-size: 13px;

            font-weight: 600;
        }


        .btn-edit:hover {

            background: #d98d00;

            color: white;
        }


        /* =========================
           BUTTON HAPUS
        ========================= */

        .btn-hapus {

            background: #dc2635;

            color: white;

            border: none;

            border-radius: 7px;

            padding: 7px 13px;

            font-size: 13px;

            font-weight: 600;
        }


        .btn-hapus:hover {

            background: #b91d2a;

            color: white;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {

            text-align: center;

            color: #89919c;

            font-size: 13px;

            padding: 25px 0 0;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 768px) {

            .main-container {

                margin: 20px auto;

                padding: 0 12px;
            }


            .main-card {

                padding: 22px;

                border-radius: 16px;
            }


            .page-header {

                display: block;
            }


            .page-title {

                font-size: 30px;
            }


            .btn-tambah {

                margin-top: 20px;
            }


            .table-wrapper {

                overflow-x: auto;
            }


            .table {

                min-width: 650px;
            }

        }

    </style>

</head>


<body>


<!-- =================================================
     NAVBAR
================================================= -->

<nav class="navbar navbar-expand-lg">

    <div class="container">


        <!-- LOGO -->

        <a class="navbar-brand" href="../index.php">

            <i class="bi bi-mortarboard-fill"></i>

            Sistem Akademik

        </a>


        <!-- MOBILE -->

        <button
            class="navbar-toggler bg-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menuNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- MENU -->

        <div
            class="collapse navbar-collapse"
            id="menuNav">


            <ul class="navbar-nav ms-4">


                <!-- DASHBOARD -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../index.php">

                        <i class="bi bi-house-fill"></i>

                        Dashboard

                    </a>

                </li>


                <!-- SISWA AKTIF -->

                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="../siswa">

                        <i class="bi bi-people-fill"></i>

                        Siswa

                    </a>

                </li>


                <!-- GURU -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../guru">

                        <i class="bi bi-person-badge-fill"></i>

                        Guru

                    </a>

                </li>


                <!-- MAPEL -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../mapel">

                        <i class="bi bi-book-fill"></i>

                        Mapel

                    </a>

                </li>


                <!-- NILAI -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../nilai">

                        <i class="bi bi-bar-chart-fill"></i>

                        Nilai

                    </a>

                </li>


            </ul>


            <!-- USER -->

            <div class="ms-auto d-flex align-items-center">


                <div class="user-login">

                    <i class="bi bi-person-circle"></i>

                    <?php echo $_SESSION['username']; ?>

                </div>


                <!-- LOGOUT -->

                <a
                    href="../logout.php"
                    class="btn btn-logout"
                    onclick="return confirm('Yakin ingin logout?')">

                    <i class="bi bi-box-arrow-right"></i>

                    Logout

                </a>


            </div>

        </div>

    </div>

</nav>


<!-- =================================================
     MAIN
================================================= -->

<div class="main-container">


    <div class="main-card">


        <!-- HEADER -->

        <div class="page-header">


            <div>

                <h1 class="page-title">

                    <i class="bi bi-people-fill"></i>

                    Data Siswa

                </h1>


                <div class="yellow-line"></div>


                <p class="page-description">

                    Sistem informasi data siswa sekolah

                </p>

            </div>


            <!-- TAMBAH DATA -->

            <a
                href="tambah.php"
                class="btn btn-tambah">

                <i class="bi bi-plus-circle"></i>

                Tambah Data

            </a>


        </div>


        <!-- =================================================
             TABLE
        ================================================== -->

        <div class="table-wrapper">

            <table
                class="table table-hover">


                <thead>

                    <tr>

                        <th width="20%">
                            NIS
                        </th>

                        <th width="30%">
                            Nama
                        </th>

                        <th width="30%">
                            Alamat
                        </th>

                        <th width="20%">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php

                $query = mysqli_query(
                    $koneksi,
                    "SELECT * FROM siswa"
                );


                while ($data = mysqli_fetch_array($query)) {

                ?>

                    <tr>


                        <td>

                            <?php
                            echo $data['nis'];
                            ?>

                        </td>


                        <td>

                            <?php
                            echo $data['nama'];
                            ?>

                        </td>


                        <td>

                            <?php
                            echo $data['alamat'];
                            ?>

                        </td>


                        <td>


                            <!-- EDIT -->

                            <a
                                href="edit.php?nis=<?php echo $data['nis']; ?>"
                                class="btn btn-edit">

                                <i class="bi bi-pencil-fill"></i>

                                Edit

                            </a>


                            <!-- HAPUS -->

                            <a
                                href="hapus.php?nis=<?php echo $data['nis']; ?>"
                                class="btn btn-hapus"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">

                                <i class="bi bi-trash-fill"></i>

                                Hapus

                            </a>


                        </td>


                    </tr>


                <?php

                }

                ?>


                </tbody>

            </table>

        </div>


        <!-- FOOTER -->

        <footer>

            <i class="bi bi-shield-check"></i>

            © 2026 Sistem Akademik
            • Data Siswa

        </footer>


    </div>

</div>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>
