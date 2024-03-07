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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    *{
        font-family: 'Poppins';
    }

    body{
        background-image: url(assets/perpusbesamalanding.jpg);
        /* background-size: cover; */
    }

    

</style>

<body>
    <h1 class="mt-4" style="margin-left: 2rem; font-weight: bold; font-family: Bungee; color: orange;">Buku</h1>
    <div class="card" style="margin-left: 5rem; margin-right: 5rem; background-image: url(assets/bgutama.jpg); background-size: cover;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="buku_tambah.php" class="btn btn-primary" style="margin-bottom: 2rem;">+ Tambah Data</a>
                    <a href="pendataan.php" class="btn btn-danger" style="margin-bottom: 2rem;">Kembali</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr >
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori  on buku.id_kategori = kategori.id_kategori");
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $data['kategori']; ?>
                                </td>
                                <td>
                                    <?php echo $data['judul']; ?>
                                </td>
                                <td>
                                    <?php echo $data['penulis']; ?>
                                </td>
                                <td>
                                    <?php echo $data['penerbit']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tahun_terbit']; ?>
                                </td>
                                <td>
                                    <?php echo $data['deskripsi']; ?>
                                </td>
                                <td><img src="uploaded/<?= $data['gambar']; ?>" width="100" height="100"></td>
                                <td>
                                    <a href="buku_ubah.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-primary mb-2">Ubah</a>
                                    <a onclick="return confirm('Apakah anda yakin ingin hapus data ini?');"
                                        href="buku_hapus.php?id=<?php echo $data['id_buku']; ?>"
                                        class="btn btn-danger">Hapus</a>
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