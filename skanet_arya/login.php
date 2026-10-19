<?php
include "koneksi.php";

session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi,
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'"
    );

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $username;

        header("location:index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Data Guru</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #102542, #294b73);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .icon {
            font-size: 55px;
            text-align: center;
            margin-bottom: 10px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            color: #17243b;
            font-size: 30px;
        }

        .subjudul {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #287be5;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #1765c4;
            color: white;
        }

        .footer {
            text-align: center;
            color: #999;
            margin-top: 25px;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="icon">👨‍🏫</div>

    <h2 class="judul">Login</h2>

    <p class="subjudul">
        Sistem Informasi Data Guru
    </p>

    <?php if(isset($error)){ ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php } ?>

    <form method="post">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input 
                type="text" 
                name="username" 
                class="form-control"
                placeholder="Masukkan username"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-control"
                placeholder="Masukkan password"
                required>
        </div>

        <button type="submit" name="login" class="btn btn-login">
            🔐 Login
        </button>

    </form>

    <div class="footer">
        © Sistem Data Guru • School Dashboard
    </div>

</div>

</body>
</html>