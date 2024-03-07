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
        font-family: Poppins;
    }
    body{
        background-image: url(assets/perpusbesamalanding.jpg);
    }
</style>

<body>

    <h1 class="mt-4 ms-4" style="font-family: Bungee; color: orange;">Buku</h1>
    <div class="card" style="margin: 2rem;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">

                        <?php
                        $id = $_GET['id'];
                        if (isset($_POST['submit'])) {
                            $id_kategori = $_POST['id_kategori'];
                            $judul = $_POST['judul'];
                            $gambar = $_FILES['gambar']['name'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];

                            $fileName = uniqid("", true);
                            $fileType = explode("image/", $_FILES["gambar"]["type"]);
                            move_uploaded_file($_FILES["gambar"]["tmp_name"], "uploaded/" . $fileName . "." . end($fileType));

                            $newFile = $fileName.'.'.end($fileType);

                            $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', gambar='$newFile', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku='$id'");
                            if ($query) {
                                echo '<script>alert("Ubah data berhasil.");</script>';
                            } else {
                                echo '<script>alert("Ubah data gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = $id");
                        $data = mysqli_fetch_array($query);
                        ?>

                        <div class="row mb-3">
                            <div class="col-md-2">Kategori</div>
                            <div class="col-md-8">
                                <select name="id_kategori" class="form-control">
                                    <?php
                                    $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while ($kategori = mysqli_fetch_array($kat)) {
                                        ?>
                                        <option <?php if ($kategori['id_kategori'] == $data['id_kategori'])
                                            echo 'selected'; ?> value="<?php echo $kategori['id_kategori']; ?>">
                                            <?php echo $kategori['kategori']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Judul</div>
                            <div class="col-md-8"><input type="text" value="<?php echo $data['judul'] ?>"
                                    class="form-control" name="judul">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penulis</div>
                            <div class="col-md-8"><input type="text" value="<?php echo $data['penulis'] ?>"
                                    class="form-control" name="penulis"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penerbit</div>
                            <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit'] ?>"
                                    class="form-control" name="penerbit"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tahun Terbit</div>
                            <div class="col-md-8"><input type="number" value="<?php echo $data['tahun_terbit'] ?>"
                                    class="form-control" name="tahun_terbit"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Deskripsi</div>
                            <div class="col-md-8"><textarea name="deskripsi" rows="5"
                                    class="form-control"><?php echo $data['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Gambar</div>
                            <div class="col-md-8"><input type="file" name="gambar"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="buku.php" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
</body>

</html>