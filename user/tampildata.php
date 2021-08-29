<?php
    include '../koneksi.php'
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Starbhak Mart</title>

    <style>
        .jumbotron{
            height: 300px;
            background-color: #4bcffa;
        }
        .keranjang{
            height: 50px;
        }
        .card-img-top{
            height: 150px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Starbhak Mart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editdata.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- Jumbottron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-white text-center">Starbhak Mart</h1>
        </div>
    </div>
    <div class="container">
        <!-- Bagian List -->
        <div class="row">
            <div class="col-4">
                <!-- <h4><a class="btn btn-primary btn-block  mb-2" href="editdata.php"><i class="fas fa-edit"></i> Edit</a></h4> -->
                <div class="keranjang bg-primary rounded text-center text-white pt-2">
                    <svg width="2em" height="2em"viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                             d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                </div>
            <div class="listkeranjang" id="listkeranjang">
            <?php
                $sql = "SELECT * FROM keranjang, produk WHERE keranjang.id_produk=produk.id_produk";
                $query = mysqli_query($connect, $sql);
                    if($query){
                        // Inisialisasi
                        $diskon = 0;
                        $ppn = 0;
                        $totalbayar = 0;
                        $data = array();
                        while ($keranjang = mysqli_fetch_array($query)){
                            $data[] = array(
                                "id_produk" => $keranjang['id_produk'],
                                "nama_produk" => $keranjang['nama_produk'],
                                "harga_produk" => $keranjang['harga_produk'],
                                "jumlah_harga" => $keranjang['jumlah_harga'],
                                "quantity" => $keranjang['quantity']
                        );
                            
                            $totalbayar = $totalbayar + $keranjang['jumlah_harga'];
                            if($totalbayar > 50000){
                                $diskon = $totalbayar * 0.05;
                            }else{
                                $diskon = 0;
                            }
                            
                            $ppn = $totalbayar * 0.1;

                            echo '<div class="invoice bg-white border border-dark pl-1 pt-1 m-1">';
                            echo '<div class="row">';
                            echo '<div class="col-5">';
                            echo '<h6>' . $keranjang['nama_produk'] . '</h6>';
                            echo '<p>Price : <span>Rp.'  . number_format($keranjang['jumlah_harga']) .  '</span></p>';
                            echo '</div>';
                            echo '<div class="col-4">';
                            echo '<h6 class="font-fira text-right"></h6>';
                            echo '<p>Quantity : <span>' . number_format($keranjang['quantity']) .  '</span></p>';
                            echo '</div>';
                            echo '<div class="col-3">';
    
                            echo '<a href="hapuskeranjang.php?id_keranjang=' . $keranjang['id_keranjang'] . '"><button class="btn btn-danger btn-sm">';
                            echo '<svg width="30px" height="30px" viewBox="0 0 16 16" class="bi bi-trash mt-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
                            echo '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />';
                            echo '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />';
                            echo '</svg>';
                            echo '</button></a>';
    
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
            
           echo "</div>
                <table width='100%'>
                    <tbody>
                        <tr>
                            <td>Diskon 5%</td>
                            <td>Rp. <span id='diskon'>".number_format($diskon)."</span></td>
                        </tr>
                        <tr>
                            <td>PPN 10%</td>
                            <td>Rp. <span id='ppn'>".number_format($ppn)."</span></td>
                        </tr>
                        <tr class='bg-dark text-white'>
                            <td>Total Bayar</td>
                            <td>Rp. <span id='totalbayar'>".number_format($totalbayar)."</span></td>
                        </tr>
                    </tbody>
                </table>
                <form action='transaksi.php?transaksi=".serialize($data)."' method='POST'>
                        <input type='hidden' name='diskon' value='".$diskon."'>
                        <input type='hidden' name='ppn' value='".$ppn."'>
                        <input type='hidden' name='totalbayar' value='".$totalbayar."'>
                        <button type='submit' class='btn btn-block btn-danger p-2 mt-3'>
                        <i class='fas fa-shopping-basket'></i>
                            Payment
                        </button>
                    </form>
            </div>"
            ?>
            <div class="col-8" id="listproduk">
            <?php
            $sql = "SELECT * FROM produk";
            $query = mysqli_query($connect,$sql);

            while($produk = mysqli_fetch_array($query)){
                echo '<div class="card float-left mr-3 mb-3" style="width: 200px;">';
                echo '<img src="'. $produk['gambar_produk'] .'" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h6 class="card-title">' . $produk['nama_produk'] . '</h6>';
                echo '<p class="card-text">Rp.' . $produk['harga_produk'] . '</p>';
                // echo '<a href="keranjang.php" class="btn btn-primary btn-block ">Beli</a>';
                echo "<a href='keranjang.php?id=$produk[id_produk]' class='btn btn-primary btn-block '>Beli</a>";
                echo '</div>';
                echo '</div>';
            }
            ?>
            </div>
        </div>
        <table class="table table-bordered text-center mt-4 mb-5">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Id Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Quantity</th>
                    <th>Total bayar</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM transaksi_detail";
            $query = mysqli_query($connect, $sql);

            while ($transaksi_detail = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $transaksi_detail['id_produk'] . "</td>";
                echo "<td>" . $transaksi_detail['nama_produk'] . "</td>";
                echo "<td>" . $transaksi_detail['harga_produk'] . "</td>";
                echo "<td>" . $transaksi_detail['quantity'] . "</td>";
                echo "<td>" . $transaksi_detail['total_bayar'] . "</td>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- <script src="index.js"></script> -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>