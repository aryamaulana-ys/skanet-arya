<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Nilai</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icon -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<style>

body{
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    background:linear-gradient(135deg,#0f172a,#1e3a5f,#334155);
    padding-top:80px;
}


/* ================= NAVBAR ================= */

.navbar-custom{

    background:rgba(15,23,42,.96);

    box-shadow:
    0 5px 20px rgba(0,0,0,.25);

}

.navbar-brand{

    color:white !important;
    font-weight:700;
    font-size:21px;

}

.navbar-brand i{

    color:#f59e0b;
    margin-right:7px;

}


.nav-link{

    color:#cbd5e1 !important;
    font-weight:500;
    margin:0 4px;
    border-radius:8px;
    padding:8px 13px !important;

}


.nav-link:hover{

    background:#334155;
    color:white !important;

}


.nav-link.active{

    background:#2563eb;
    color:white !important;

}


.btn-logout{

    background:#dc2626;
    color:white !important;
    border-radius:8px;

}


.btn-logout:hover{

    background:#b91c1c;
    color:white !important;

}



/* ================= CONTAINER ================= */

.container-box{

    background:white;
    margin-top:20px;
    padding:35px;
    border-radius:25px;
    box-shadow:0 15px 40px rgba(0,0,0,.35);

}


/* ================= JUDUL ================= */

.icon{

    font-size:45px;

}


.title{

    font-weight:700;
    color:#0f172a;

}


.subtitle{

    color:#64748b;

}


.line{

    width:80px;
    height:4px;
    background:#f59e0b;
    border-radius:10px;

}



/* ================= BUTTON TAMBAH ================= */

.btn-tambah{

    background:#2563eb;
    color:white;
    padding:10px 20px;
    border-radius:12px;
    font-weight:600;

}


.btn-tambah:hover{

    background:#1d4ed8;
    color:white;

}



/* ================= TABLE ================= */

.table{

    overflow:hidden;

}


.table thead th{

    background:#0f172a;
    color:white;
    padding:15px;

}


.table tbody tr:hover{

    background:#f1f5f9;

}


.table tbody td{

    padding:13px;

}



/* ================= BUTTON EDIT ================= */

.btn-edit{

    background:#f59e0b;
    color:white;
    border-radius:10px;
    padding:6px 15px;

}


.btn-edit:hover{

    background:#d97706;
    color:white;

}



/* ================= BUTTON HAPUS ================= */

.btn-hapus{

    background:#dc2626;
    color:white;
    border-radius:10px;
    padding:6px 15px;

}


.btn-hapus:hover{

    background:#b91c1c;
    color:white;

}



/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    body{
        padding-top:70px;
    }

    .container-box{
        padding:20px;
        margin-top:10px;
    }

    .title{
        font-size:25px;
    }

    .btn-tambah{
        margin-top:15px;
    }

}

</style>

</head>


<body>


<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">

<div class="container">

    <a class="navbar-brand" href="../index.php">

        <i class="bi bi-mortarboard-fill"></i>

        Sistem Akademik

    </a>


    <button
    class="navbar-toggler bg-light"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarMenu">

        <span class="navbar-toggler-icon"></span>

    </button>


    <div class="collapse navbar-collapse" id="navbarMenu">


        <ul class="navbar-nav ms-4">


            <li class="nav-item">

                <a class="nav-link" href="../index.php">

                    <i class="bi bi-house-fill"></i>
                    Dashboard

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link" href="../siswa">

                    <i class="bi bi-people-fill"></i>
                    Siswa

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link" href="../guru">

                    <i class="bi bi-person-badge-fill"></i>
                    Guru

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link" href="../mapel">

                    <i class="bi bi-book-fill"></i>
                    Mapel

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link active" href="index.php">

                    <i class="bi bi-bar-chart-fill"></i>
                    Nilai

                </a>

            </li>


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



<!-- ================= DATA NILAI ================= -->

<div class="container">


<div class="container-box">


<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">


<div>

<div class="icon">
📊🎓
</div>


<h1 class="title">
Data Nilai Siswa
</h1>


<div class="line mb-3"></div>


<p class="subtitle">
Sistem informasi nilai akademik sekolah
</p>


</div>



<div>

<a href="tambah.php" class="btn btn-tambah">

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

<th>ID Nilai</th>
<th>Nama Siswa</th>
<th>Mata Pelajaran</th>
<th>Nama Guru</th>
<th>Nilai</th>
<th>Aksi</th>

</tr>

</thead>



<tbody>


<?php

$query=mysqli_query($koneksi,

"SELECT 
nilai.id_nilai,
siswa.nama AS namasiswa,
guru.nama AS namaguru,
mapel.nama_mapel,
nilai.nilai

FROM siswa,guru,mapel,nilai

WHERE 
nilai.nis=siswa.nis 
AND nilai.nip=guru.nip 
AND nilai.id_mapel=mapel.id_mapel"

);


while($data=mysqli_fetch_array($query)){

?>


<tr>


<td>
<?php echo $data['id_nilai']; ?>
</td>


<td>
<?php echo $data['namasiswa']; ?>
</td>


<td>
<?php echo $data['nama_mapel']; ?>
</td>


<td>
<?php echo $data['namaguru']; ?>
</td>


<td>

<span class="badge bg-primary">

<?php echo $data['nilai']; ?>

</span>

</td>



<td>


<a href="edit.php?id_nilai=<?php echo $data['id_nilai']; ?>"
class="btn btn-edit btn-sm">

<i class="bi bi-pencil-fill"></i>
Edit

</a>



<a href="hapus.php?id_nilai=<?php echo $data['id_nilai']; ?>"
class="btn btn-hapus btn-sm"
onclick="return confirm('Yakin ingin menghapus data nilai ini?')">

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

<div class="text-center mt-4 text-secondary">

© 2026 Sistem Akademik Sekolah • Data Nilai

</div>


</div>

</div>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>