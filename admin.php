<?php
session_start();
if ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'petugas') {
    header("Location: pengguna.php");
    exit;
}

// Log out logic
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

require_once("koneksi2.php");
$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        
        /* Custom CSS untuk desain tambahan */
        body {
            font-family: 'Poppins';
            background-color: #f8f9fa;
            background-image: url(assets/6shapegrad.jpg);
            background-size: cover;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
            background-image: url(assets/cardbgad.jpg); 
            background-size: cover;
            border-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            color: #fff;
        }

        .btn-primary {
            background-color: #4942E4;
            border-color: white;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .container {
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .header h2 {
            color: #007bff;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-container .col-md-4 {
            flex: 0 0 30%;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logout Button -->
        <form method="post">
            <button type="submit" name="logout" class="btn btn-danger"
                style="float: ; margin-top: 10px;">Logout</button>
        </form>
        <!-- End Logout Button -->

        <div class="header">
            <h2 style="font-family: Bungee; margin-top: 1rem; color: orange;">Halo! Selamat Datang Pustakawan</h2>
            <p>Apa yang ingin anda lakukan hari ini?</p>
        </div>
        <div class="card-container">
            <!--Generate Laporan -->
            <div class="col-md-4">
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="card-title">Generate Laporan</h5>
                        <p class="card-text">Klik Untuk Mengenerate</p>
                        <a href="laporan.php" class="btn btn-primary">Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Register Officer -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftarkan Petugas</h5>
                        <p class="card-text">Klik Untuk Mendaftarkan Petugas</p>
                        <a href="register_petugas.php" class="btn btn-primary">Daftarkan Petugas</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Inventory Management -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendataan Barang</h5>
                        <p class="card-text">Klik Untuk Mengupdate Data Barang</p>
                        <a href="pendataan.php" class="btn btn-primary">Data Barang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>