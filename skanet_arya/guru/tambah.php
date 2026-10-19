<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Poppins', sans-serif;
            min-height:100vh;
            background:
            linear-gradient(135deg,#0f172a,#1e3a5f,#334155);
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            width:450px;
            border:none;
            border-radius:20px;
            background:#ffffff;
            box-shadow:0 15px 40px rgba(0,0,0,.35);
        }

        .title{
            color:#0f172a;
            font-weight:700;
        }

        .subtitle{
            color:#64748b;
            font-size:14px;
        }

        .icon{
            font-size:45px;
        }

        .form-label{
            font-weight:600;
            color:#334155;
        }

        .form-control{
            border-radius:12px;
            border:1px solid #cbd5e1;
            padding:12px;
        }

        .form-control:focus{
            border-color:#2563eb;
            box-shadow:0 0 10px rgba(37,99,235,.2);
        }

        .btn-simpan{
            background:#2563eb;
            color:white;
            border-radius:12px;
            padding:12px;
            font-weight:600;
            transition:.3s;
        }

        .btn-simpan:hover{
            background:#1d4ed8;
            color:white;
            transform:translateY(-2px);
        }

        .btn-kembali{
            border-radius:12px;
            padding:12px;
        }

        .line{
            height:3px;
            width:70px;
            background:#f59e0b;
            margin:auto;
            border-radius:10px;
        }

    </style>

</head>

<body>

<div class="card p-4">

    <div class="text-center mb-4">

        <div class="icon">
            👨‍🏫
        </div>

        <h2 class="title">
            Tambah Data Guru
        </h2>

        <div class="line mb-3"></div>

        <p class="subtitle">
            Masukkan informasi guru dengan lengkap
        </p>

    </div>


    <form action="simpan.php" method="POST">

        <div class="mb-3">
            <label class="form-label">
                NIP
            </label>

            <input 
                type="text" 
                name="nip" 
                class="form-control"
                placeholder="Masukkan NIP"
                required>
        </div>


        <div class="mb-3">
            <label class="form-label">
                Nama Guru
            </label>

            <input 
                type="text" 
                name="nama" 
                class="form-control"
                placeholder="Masukkan nama guru"
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
                placeholder="Masukkan alamat"
                required></textarea>
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