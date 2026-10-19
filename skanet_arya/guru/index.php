<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Guru</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">


    <style>

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;

            background:linear-gradient(
                135deg,
                #0f172a,
                #1e3a5f,
                #334155
            );

            padding-top:80px;
        }


        /* ================= NAVBAR ================= */

        .navbar-custom{

            background:#0f172a;

            box-shadow:
            0 5px 20px rgba(0,0,0,.30);

        }


        .navbar-brand{

            color:white !important;

            font-weight:700;

            font-size:21px;

        }


        .navbar-brand i{

            color:#f59e0b;

            margin-right:8px;

        }


        .nav-link{

            color:#cbd5e1 !important;

            font-weight:500;

            padding:9px 13px !important;

            margin:0 3px;

            border-radius:9px;

        }


        .nav-link:hover{

            background:#334155;

            color:white !important;

        }


        /* MENU GURU AKTIF */

        .nav-link.active{

            background:#2563eb;

            color:white !important;

        }


        /* LOGOUT */

        .btn-logout{

            background:#dc2626;

            color:white !important;

        }


        .btn-logout:hover{

            background:#b91c1c;

            color:white !important;

        }



        /* ================= CONTAINER ================= */

        .container-box{

            background:white;

            border-radius:25px;

            padding:35px;

            margin-top:20px;

            box-shadow:
            0 15px 40px rgba(0,0,0,.35);

        }


        /* ================= JUDUL ================= */

        .title{

            font-weight:700;

            color:#0f172a;

        }


        .subtitle{

            color:#64748b;

        }


        .icon{

            font-size:45px;

        }


        .line{

            width:80px;

            height:4px;

            background:#f59e0b;

            border-radius:10px;

        }



        /* ================= TAMBAH ================= */

        .btn-tambah{

            background:#2563eb;

            color:white;

            border-radius:12px;

            padding:10px 20px;

            font-weight:600;

            transition:.3s;

        }


        .btn-tambah:hover{

            background:#1d4ed8;

            color:white;

            transform:translateY(-2px);

        }



        /* ================= TABLE ================= */

        table{

            overflow:hidden;

            border-radius:15px;

        }


        .table thead th{

            background:#0f172a;

            color:white;

            padding:15px;

        }


        tbody tr:hover{

            background:#f1f5f9;

            transition:.3s;

        }



        /* ================= EDIT ================= */

        .btn-edit{

            background:#f59e0b;

            color:white;

            border-radius:10px;

            padding:6px 15px;

            font-size:14px;

        }


        .btn-edit:hover{

            background:#d97706;

            color:white;

        }



        /* ================= HAPUS ================= */

        .btn-hapus{

            background:#dc2626;

            color:white;

            border-radius:10px;

            padding:6px 15px;

            font-size:14px;

        }


        .btn-hapus:hover{

            background:#b91c1c;

            color:white;

        }



        /* ================= FOOTER ================= */

        footer{

            color:#64748b;

            font-size:14px;

        }



        /* ================= RESPONSIVE ================= */

        @media(max-width:768px){

            body{

                padding-top:75px;

            }

            .container-box{

                padding:20px;

            }

            .title{

                font-size:26px;

            }

        }

    </style>

</head>


<body>


<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">

    <div class="container">


        <!-- LOGO -->

        <a class="navbar-brand" href="../index.php">

            <i class="bi bi-mortarboard-fill"></i>

            Sistem Akademik

        </a>



        <!-- TOGGLE MOBILE -->

        <button
            class="navbar-toggler bg-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>



        <!-- MENU -->

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-4">


                <!-- DASHBOARD -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="../index.php">

                        <i class="bi bi-house-fill"></i>

                        Dashboard

                    </a>

                </li>



                <!-- SISWA -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="../siswa">

                        <i class="bi bi-people-fill"></i>

                        Siswa

                    </a>

                </li>



                <!-- GURU -->

                <li class="nav-item">

                    <a class="nav-link active"
                    href="index.php">

                        <i class="bi bi-person-badge-fill"></i>

                        Guru

                    </a>

                </li>



                <!-- MAPEL -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="../mapel">

                        <i class="bi bi-book-fill"></i>

                        Mapel

                    </a>

                </li>



                <!-- NILAI -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="../nilai">

                        <i class="bi bi-bar-chart-fill"></i>

                        Nilai

                    </a>

                </li>



                <!-- LOGOUT -->

                <li class="nav-item">

                    <a class="nav-link btn-logout ms-lg-2"
                    href="../logout.php"
                    onclick="return confirm('Yakin ingin logout?')">

                        <i class="bi bi-box-arrow-right"></i>

                        Logout

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>



<!-- ================= DATA GURU ================= -->

<div class="container">

    <div class="container-box">


        <!-- HEADER -->

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">


            <div>

                <div class="icon">
                    👨‍🏫
                </div>

                <h1 class="title">
                    Data Guru
                </h1>

                <div class="line mb-3"></div>

                <p class="subtitle">
                    Sistem informasi data guru sekolah
                </p>

            </div>



            <!-- TAMBAH DATA -->

            <div>

                <a href="tambah.php"
                class="btn btn-tambah">

                    <i class="bi bi-plus-circle"></i>

                    Tambah Data

                </a>

            </div>


        </div>



        <!-- ================= TABLE ================= -->

        <div class="table-responsive">


            <table class="table table-bordered table-hover align-middle">


                <thead>

                    <tr>

                        <th>NIP</th>

                        <th>Nama</th>

                        <th>Alamat</th>

                        <th width="200">Aksi</th>

                    </tr>

                </thead>



                <tbody>


                <?php

                $query=mysqli_query(
                    $koneksi,
                    "SELECT * FROM guru"
                );

                while($data=mysqli_fetch_array($query)){

                ?>


                    <tr>


                        <td>

                            <?php echo $data['nip']; ?>

                        </td>



                        <td>

                            <?php echo $data['nama']; ?>

                        </td>



                        <td>

                            <?php echo $data['alamat']; ?>

                        </td>



                        <td>


                            <!-- EDIT -->

                            <a
                            href="edit.php?nip=<?php echo $data['nip']; ?>"
                            class="btn btn-edit">

                                <i class="bi bi-pencil-fill"></i>

                                Edit

                            </a>



                            <!-- HAPUS -->

                            <a
                            href="hapus.php?nip=<?php echo $data['nip']; ?>"
                            class="btn btn-hapus"

                            onclick="return confirm('Yakin ingin menghapus data ini?')">

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

        <footer class="text-center mt-4">

            © Sistem Data Guru • Elegant School Dashboard

        </footer>


    </div>

</div>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>