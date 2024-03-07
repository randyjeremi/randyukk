<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Bersama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<style>
    *{
        font-family: Poppins;
    }
    body{
        background-image: url(assets/perpusbesamalanding.jpg);
    }
</style>

<body>
    <h1 class="mt-4" style="font-family: Bungee; margin: 2rem;">Laporan Peminjaman Buku</h1>
    <div class="card" style="margin: 2rem;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="cetak.php" target="_blank" class="btn btn-primary" style=" margin-bottom: 2rem;"><i class="bi bi-printer-fill"></i>Cetak
                        Data</a>
                    <a href="pendataan.php" class="btn btn-danger" style=" margin-bottom: 2rem;">Kembali</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Rating</th>
                        </tr>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT peminjaman.*,user.*,buku.*, ulasan.* FROM peminjaman INNER JOIN ulasan on ulasan.id_user = peminjaman.id_user INNER JOIN user on user.id_user = peminjaman.id_user INNER JOIN buku on buku.id_buku = peminjaman.id_buku");


                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $data['judul']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tanggal_peminjaman']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tanggal_pengembalian']; ?>
                                </td>
                                <td>
                                    <?php echo $data['status_pengembalian']; ?>
                                </td>
                                <td>
                                    <?php echo $data['rating']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>