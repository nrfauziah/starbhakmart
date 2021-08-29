<?php
include '../koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Tampilan Produk</title>

    <style>
        body {
            background: url(https://i.pinimg.com/236x/b5/74/e0/b574e060f76ae0f50d256305405ede91.jpg);
            text-decoration-color: white;
        }
        .container {
            width: 85%;
        }

    </style>
</head>
<body>
    <a href="forminputproduk.php" class="btn btn-dark mt-5 mb-4" style="margin-left: 120px;">Tambah Data</a>
    
    <div class="container">
        
        <div class="text-center bg-white">
            <!-- table -->
            <table class="table table-bordered ">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Modify</th>
                    </tr>
                </thead>
                <tbody>


                <?php
                    $sql = "SELECT * FROM produk";
                    $query = mysqli_query($connect, $sql);
                    $no = 1;
                    $kode = 0;

                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>";

                        echo "<td class='nama_produk'>" . $row['nama_produk'] . "</td>";
                        echo "<td class='harga'>" . $row['harga'] . "</td>";

                        echo "<td>";
                        echo "<img src='" . $row['gambar'] . "' style='width: 50px; height: 50px;'>";
                        echo "</td>";

                        echo "<td>";
                        echo "<a class='btn btn-success' href='formeditproduk.php?nama_produk=" . $row['nama_produk'] . "'>Edit</a> | ";
                        echo "<a class='btn btn-danger' href='hapus.php?nama_produk=" . $row['nama_produk'] . " '>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>