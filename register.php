<?php
require_once('koneksi.php');
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);

    $role = 'peminjam';

    $insert = mysqli_query($koneksi, "INSERT INTO user(nama,username,alamat,email,password,no_telepon,role) VALUES('$nama','$username','$alamat','$email','$password','$no_telepon','$role')");
    if ($insert) {
        echo '<script>alert("Selamat, Register Berhasil"); location.href="login.php";</script>';
    } else {
        echo '<script>alert("Register gagal, silahkan ulangi kembali");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Bersama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins';
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-image: url(assets/v904-nunny-012.jpg);
            background-size: cover;
        }

        .container {
            background-image: url(assets/5516143.jpg);
            padding: 20px;
            border-radius: 10px;
            width: 70%;
            /* Ubah lebar container menjadi 70% dari lebar layar */
            max-width: 400px;
            /* Tetapkan lebar maksimum container */
            color: white;
            background-size: cover;
        }

        .container form {
            max-width: 100%;
            /* Form mengisi seluruh lebar container */
        }

        .mb-3 {
            margin-bottom: 15px;
            /* Jarak antar elemen formulir */
        }
    </style>

</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Register</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="fullName" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                    id="inputPassword" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">No.Telepon</label>
                <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan No Telepon" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
            </div>
            <p class="mb-3">Sudah punya akun? <a href="login.php" style="color: orange;">Login</a></p>
            <button style="width: 100%;" type="submit" class="btn btn-primary mt-2" name="register">Register</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>