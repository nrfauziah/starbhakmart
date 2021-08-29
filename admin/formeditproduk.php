<?php
include '../koneksi.php';
    $nama_produk = $_GET['nama_produk'];
    $sql    = "SELECT * FROM produk WHERE nama_produk='$nama_produk'";
    $query  = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);

if ( mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Form Edit Produk</title>
    
    <style>
        body {
            background: url(https://i.pinimg.com/236x/b5/74/e0/b574e060f76ae0f50d256305405ede91.jpg);
            text-decoration-color: white;
        }

        .card {
            width: 650px;
            height: 450px;
            margin-top: 80px;
        }
        .card-header {
            width: 650px;
        }
        .container {
            width: 700px;
        }
    </style>
</head>
<body>
    <form action="edit.php" method="POST">
    <div class="container">
            <div class="card">
            <form method="POST" action="edit.php" enctype="multipart/form-data" >
                <h4 class="card-header bg-dark text-white text-center">Form Edit Produk</h4>
                    <div class="card-body">
                        <section class="base">
                        <!-- Id Produk -->
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id"/>
                            </div>
                        </div>

                        <!-- Nama Produk -->
                        <div class="form-group row justify-content-center">
                            <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $row['nama_produk']?>" name="nama_produk" id="txt_namaproduk">
                            </div>
                        </div>

                        <!-- Harga Produk -->
                        <div class="form-group row justify-content-center">
                            <label for="harga" class="col-sm-3 col-form-label">Harga Produk :</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="<?php echo $row['harga']?>" name="harga" id="txt_hargaproduk">
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="form-group row justify-content-center">
                            <label for="gambar" class="col-sm-3 col-form-label">Url Gambar :</label>
                            <div class="col-sm-6">
                                <img src="<?php echo $row['gambar']; ?>" style="width: 150px; height: 95px; float: left; margin-bottom: 10px;">
                                <input type="text" class="form-control" name="gambar" >
                            </div>
                        </div>

                        <!-- Button simpan & kembali -->
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-9 mt-4 mb-4">
                                <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                                <a href="tampilanproduk.php" class="btn btn-warning float-right" role="button">Kembali</a>
                            </div>
                        </div>
                    </section>
                    </div>
            </form>
            </div>
        </div>
