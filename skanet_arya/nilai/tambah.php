<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Data Nilai</title>


<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<style>

body{
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    background:linear-gradient(135deg,#0f172a,#1e3a5f,#334155);
    display:flex;
    justify-content:center;
    align-items:center;
}


.card-form{

    width:480px;
    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:0 15px 40px rgba(0,0,0,.35);

}



.icon{

    font-size:45px;

}



.title{

    color:#0f172a;
    font-weight:700;

}



.subtitle{

    color:#64748b;
    font-size:14px;

}



.line{

    width:80px;
    height:4px;
    background:#f59e0b;
    border-radius:10px;
    margin:auto;

}



.form-label{

    font-weight:600;
    color:#334155;

}



.form-select,
.form-control{

    border-radius:12px;
    padding:12px;
    border:1px solid #cbd5e1;

}



.form-select:focus,
.form-control:focus{

    border-color:#2563eb;
    box-shadow:0 0 10px rgba(37,99,235,.2);

}



.btn-simpan{

    background:#2563eb;
    color:white;
    padding:12px;
    border-radius:12px;
    font-weight:600;

}



.btn-simpan:hover{

    background:#1d4ed8;
    color:white;

}



.btn-kembali{

    border-radius:12px;
    padding:12px;

}


</style>


</head>



<body>



<div class="card-form">



<div class="text-center mb-4">


<div class="icon">
📊🎓
</div>


<h2 class="title">
Tambah Data Nilai
</h2>


<div class="line mb-3"></div>


<p class="subtitle">
Input nilai siswa dengan lengkap dan benar
</p>


</div>




<form action="simpan.php" method="post">



<div class="mb-3">

<label class="form-label">
Nama Siswa
</label>


<select name="nis" class="form-select">


<?php

$query=mysqli_query($koneksi,"SELECT * FROM siswa");

while($data=mysqli_fetch_array($query)){

?>

<option value="<?php echo $data['nis']; ?>">

<?php echo $data['nama']; ?>

</option>


<?php

}

?>


</select>


</div>





<div class="mb-3">

<label class="form-label">
Nama Guru
</label>


<select name="nip" class="form-select">


<?php

$query=mysqli_query($koneksi,"SELECT * FROM guru");

while($data=mysqli_fetch_array($query)){

?>


<option value="<?php echo $data['nip']; ?>">

<?php echo $data['nama']; ?>

</option>


<?php

}

?>


</select>


</div>





<div class="mb-3">


<label class="form-label">
Mata Pelajaran
</label>


<select name="id_mapel" class="form-select">


<?php

$query=mysqli_query($koneksi,"SELECT * FROM mapel");

while($data=mysqli_fetch_array($query)){

?>


<option value="<?php echo $data['id_mapel']; ?>">

<?php echo $data['nama_mapel']; ?>

</option>


<?php

}

?>


</select>


</div>





<div class="mb-3">


<label class="form-label">
Nilai
</label>


<input 
type="text"
name="nilai"
class="form-control"
placeholder="Masukkan nilai siswa"
required>


</div>





<div class="d-grid gap-2">


<button class="btn btn-simpan">

💾 Simpan Data

</button>



<a href="index.php" class="btn btn-outline-secondary btn-kembali">

← Kembali

</a>


</div>




</form>


</div>



</body>


</html>