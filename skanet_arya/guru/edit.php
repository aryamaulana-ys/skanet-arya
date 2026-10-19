<?php
include "koneksi.php";

$nip=$_GET['nip'];

$query=mysqli_query($koneksi,"SELECT * FROM guru WHERE nip='$nip'");
$data=mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Data Guru</title>


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


.card-edit{

    width:450px;
    background:white;
    border-radius:25px;
    padding:35px;
    box-shadow:0 15px 40px rgba(0,0,0,.35);

}


.icon{

    font-size:45px;

}


.title{

    font-weight:700;
    color:#0f172a;

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


.form-control{

    border-radius:12px;
    padding:12px;
    border:1px solid #cbd5e1;

}


.form-control:focus{

    border-color:#2563eb;
    box-shadow:0 0 10px rgba(37,99,235,.2);

}


.btn-update{

    background:#2563eb;
    color:white;
    border-radius:12px;
    padding:12px;
    font-weight:600;
    transition:.3s;

}


.btn-update:hover{

    background:#1d4ed8;
    color:white;
    transform:translateY(-2px);

}


.btn-kembali{

    border-radius:12px;
    padding:12px;

}


</style>


</head>


<body>


<div class="card-edit">


<div class="text-center mb-4">

    <div class="icon">
        ✏️👨‍🏫
    </div>


    <h2 class="title">
        Edit Data Guru
    </h2>


    <div class="line mb-3"></div>


    <p class="subtitle">
        Perbarui informasi data guru
    </p>


</div>



<form action="update.php" method="POST">


<div class="mb-3">

<label class="form-label">
    NIP
</label>

<input 
type="text"
name="nip"
class="form-control"
value="<?php echo $data['nip']; ?>"
readonly>

</div>



<div class="mb-3">

<label class="form-label">
    Nama Guru
</label>


<input 
type="text"
name="nama"
class="form-control"
value="<?php echo $data['nama']; ?>"
required>


</div>



<div class="mb-3">


<label class="form-label">
    Alamat
</label>


<textarea 
name="alamat"
class="form-control"
rows="3"
required><?php echo $data['alamat']; ?></textarea>


</div>




<div class="d-grid gap-2">


<button class="btn btn-update">

💾 Simpan Perubahan

</button>


<a href="index.php" class="btn btn-outline-secondary btn-kembali">

← Kembali

</a>


</div>



</form>



</div>



</body>

</html>