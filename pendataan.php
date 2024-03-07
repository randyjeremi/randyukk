<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins';
            background-image: url(assets/9796601.jpg);
            /* background-size: contain; */
        }

        .navbar {
            background-color: #114232 !important;
        }

        .navbar-brand,
        .navbar-text {
            color: #ffffff !important;
        }

        .card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-body {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #212529;
        }

        .card-footer {
            background-color: #FFC374;
            border-top: none;
            text-align: center;
        }

        .card-footer a {
            color: #212529;
            text-decoration: none;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: Bungee; color: orange;">Pendataan</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white mb-4" style="background-image: url(assets/23877-NUVCO2.jpg); background-size: contain;">
                    <div class="card-body" style="color: white; text-shadow: 0 6px 12px rgba(27, 27, 27, 1)">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); ?>
                        <br>Total Kategori
                    </div>
                    <div class="card-footer">
                        <a href="kategori.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-4" style="background-image: url(assets/6854740.jpg); background-size: contain;">
                    <div class="card-body" style="color: white; text-shadow: 0 6px 12px rgba(27, 27, 27, 1)">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku")); ?>
                        <br>Total Buku
                    </div>
                    <div class="card-footer">
                        <a href="buku.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4" style="background-image: url(assets/ulas2.jpg); background-size: contain;">
                    <div class="card-body" style="color: white; text-shadow: 0 6px 12px rgba(27, 27, 27, 1)">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan")); ?>
                        <br>Total Ulasan
                    </div>
                    <div class="card-footer">
                        <a href="total_ulasan.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-4" style="background-image: url(assets/avatar.jpg); background-size: contain;">
                    <div class="card-body" style="color: white; text-shadow: 0 6px 12px rgba(27, 27, 27, 1)">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?>
                        <br>Total User
                    </div>
                    <div class="card-footer">
                        <a href="total_pengguna.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>