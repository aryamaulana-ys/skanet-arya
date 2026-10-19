<?php
session_start();
include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM mapel ORDER BY id_mapel ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Mapel</title>
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
.container{max-width:1296px;margin:40px auto;background:#fff;border-radius:28px;padding:36px;box-shadow:0 20px 50px rgba(0,0,0,.35)}
.header{display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:16px}
.icons{font-size:40px;margin-bottom:6px}
h1{font-size:38px;font-weight:800;color:#0f172a}
.garis{width:80px;height:4px;background:#f59e0b;border-radius:4px;margin:8px 0 14px}
.sub{color:#64748b}
.btn{display:inline-flex;align-items:center;gap:8px;padding:11px 18px;border-radius:10px;border:none;color:#fff;font-weight:600;text-decoration:none;font-size:15px;cursor:pointer}
.btn-tambah{background:#2563eb;padding:14px 22px;font-size:17px}
.btn-edit{background:#f59e0b;padding:8px 14px;font-size:14px}
.btn-hapus{background:#dc2626;padding:8px 14px;font-size:14px}
.btn:hover{opacity:.9}
table{width:100%;border-collapse:collapse;margin-top:34px;border:1px solid #e2e8f0}
th{background:#0f172a;color:#fff;text-align:left;padding:20px 14px;font-weight:600}
td{padding:18px 14px;border-top:1px solid #e2e8f0}
tr:hover td{background:#f8fafc}
.aksi{display:flex;gap:8px}
.kosong{text-align:center;color:#64748b;padding:30px}
.footer{text-align:center;color:#64748b;margin-top:44px}
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
  <div class="header">
    <div>
      <div class="icons">📚🎓</div>
      <h1>Data Mata Pelajaran</h1>
      <div class="garis"></div>
      <p class="sub">Sistem informasi mata pelajaran sekolah</p>
    </div>
    <a href="tambah.php" class="btn btn-tambah"><i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID Mapel</th>
        <th>Nama Mapel</th>
        <th>Nama Siswa</th>
        <th>Nama Guru</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php if (mysqli_num_rows($data) > 0) { ?>
      <?php while ($d = mysqli_fetch_assoc($data)) { ?>
      <tr>
        <td><?= htmlspecialchars($d['id_mapel']) ?></td>
        <td><?= htmlspecialchars($d['nama_mapel']) ?></td>
        <td><?= htmlspecialchars($d['nama_siswa']) ?></td>
        <td><?= htmlspecialchars($d['nama_guru']) ?></td>
        <td>
          <div class="aksi">
            <a href="edit.php?id_mapel=<?= $d['id_mapel'] ?>" class="btn btn-edit"><i class="fa-solid fa-pencil"></i> Edit</a>
            <a href="hapus.php?id_mapel=<?= $d['id_mapel'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin hapus data ini?')"><i class="fa-solid fa-trash"></i> Hapus</a>
          </div>
        </td>
      </tr>
      <?php } ?>
    <?php } else { ?>
      <tr><td colspan="5" class="kosong">Belum ada data mapel.</td></tr>
    <?php } ?>
    </tbody>
  </table>

  <div class="footer">© 2026 Sistem Akademik Sekolah • Data Mapel</div>
</div>

</body>
</html>
