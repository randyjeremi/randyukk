<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Bersama - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <style>
body,
html {
    font-family: 'Poppins';
    height: 100vh;
    margin: 0;
    display: flex; 
    align-items: center;
    justify-content: center;
    background-image: url("assets/v904-nunny-012.jpg");
    background-size: cover;
    /* background-position: center; */
}

.login-container {
    background-image: url(assets/5516143.jpg);
    background-size: cover;
    color: #FFFFFF;
    padding: 40px;
    border-radius: 10px;
    width: 400px;
    text-align: center;
    animation: fadeInUp 1s ease forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-group {
    margin-bottom: 20px;
    opacity: 0;
    animation: slideIn 1s ease forwards;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.btn-login {
    width: 100%;
    opacity: 0;
    animation: slideIn 1s ease forwards;
    animation-delay: 0.5s; /* Delay the button animation */
}

.login-container a,
.login-container p a {
    color: #FFFFFF;
}
</style>

</head>

<body>
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // Ganti dengan metode penyimpanan kata sandi yang lebih aman, contoh menggunakan password_hash
        $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($data);

        if ($cek > 0) {
            $_SESSION['user'] = mysqli_fetch_array($data);
            echo '<script>alert("Selamat datang, Login Berhasil"); location.href="pengguna.php";</script>';
        } else {
            echo '<script>alert("Maaf, Username/Password salah");</script>';
        }
    }
    ?>
    
    <div class="login-container">
        <h2 class="mb-4">Login</h2>
        <p>Selamat Datang Kembali!</p>
        <form action="login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" id="email" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" id="password" placeholder="Password"
                    required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-login" name="login" value="login">Login</button>
            </div>
            <p class="mb-3">Tidak punya akun? <a href="register.php" class="text-decoration-none"
                    style="color: orange;">Register</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>