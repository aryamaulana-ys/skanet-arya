<?php
session_start();
include 'koneksi.php';

$id_mapel = (int) $_GET['id_mapel'];
$data = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel = $id_mapel");
$d = mysqli_fetch_assoc($data);

if (!$d) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Mapel</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}
body{min-height:100vh;background:linear-gradient(180deg,#0f172a,#1e3a5f);color:#0f172a}
.navbar{background:#0f172a;padding:14px 0}
.nav-inner{max-width:1296px;margin:auto;display:flex;align-items:center;gap:14px;padding:0 20px;flex-wrap:wrap}
.brand{color:#fff;font-weight:700;font-size:20px;margin-right:20px}
.brand i{color:#f59e0b}
.nav-inner a{color:#e2e8f0;text-decoration:none;padding:9px 14px;border-radius:8px;font-weight:500;font-size:15px}
.nav-inner a:hover{background:#1e293b}
.nav-inner a.active{background:#2563eb;color:#fff}
.nav-inner a.logout{background:#dc2626;color:#fff;font-weight:600}
.container{max-width:700px;margin:40px auto;background:#fff;border-radius:28px;padding:36px;box-shadow:0 20px 50px rgba(0,0,0,.35)}
h1{font-size:32px;font-weight:800}
.garis{width:80px;height:4px;background:#f59e0b;border-radius:4px;margin:8px 0 24px}
label{display:block;font-weight:600;margin:16px 0 6px}
input{width:100%;padding:12px 14px;border:1px solid #cbd5e1;border-radius:10px;font-size:15px}
input:focus{outline:none;border-color:#2563eb;box-shadow:0 0 0 3px rgba(37,99,235,.2)}
input[readonly]{background:#f1f5f9;color:#64748b}
.btns{display:flex;gap:10px;margin-top:28px}
.btn{display:inline-flex;align-items:center;gap:8px;padding:12px 20px;border-radius:10px;border:none;color:#fff;font-weight:600;text-decoration:none;font-size:15px;cursor:pointer}
.btn-simpan{background:#2563eb}
.btn-batal{background:#64748b}
.btn:hover{opacity:.9}
</style>
</head>
<body>
<div class="navbar">
  <div class="nav-inner">
    <span class="brand"><i class="fa-solid fa-graduation-cap"></i> Sistem Akademik</span>
    <a href="../home.php"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a href="../siswa/"><i class="fa-solid fa-user-group"></i> Siswa</a>
    <a href="../guru/"><i class="fa-solid fa-id-badge"></i> Guru</a>
    <a href="index.php" class="active"><i class="fa-solid fa-book-open"></i> Mapel</a>
    <a href="../nilai/"><i class="fa-solid fa-chart-simple"></i> Nilai</a>
    <a href="../logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
  </div>
</div>

<div class="container">
  <h1>✏️ Edit Mapel</h1>
  <div class="garis"></div>

  <form action="update.php" method="POST">
    <label>ID Mapel</label>
    <input type="number" name="id_mapel" value="<?= $d['id_mapel'] ?>" readonly>

    <label>Nama Mapel</label>
    <input type="text" name="nama_mapel" maxlength="50" value="<?= htmlspecialchars($d['nama_mapel']) ?>" required>

    <label>Nama Siswa</label>
    <input type="text" name="nama_siswa" maxlength="50" value="<?= htmlspecialchars($d['nama_siswa']) ?>" required>

    <label>Nama Guru</label>
    <input type="text" name="nama_guru" maxlength="50" value="<?= htmlspecialchars($d['nama_guru']) ?>" required>

    <div class="btns">
      <button type="submit" class="btn btn-simpan"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      <a href="index.php" class="btn btn-batal"><i class="fa-solid fa-xmark"></i> Batal</a>
    </div>
  </form>
</div>
</body>
</html>
