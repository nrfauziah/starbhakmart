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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Starbhak Mart</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar bg-info text-white">
        <span class="navbar-brand mb-0 h1">Starbhak Mart</span>
    </nav>
    <!-- Tutup Navbar -->
    
    <div class="container">
        <!-- Bagian troli/list -->
        <div class="row">
            <div class="col-4">
                <!-- Input produk -->
                <h4><a class="btn btn-warning mb-2 mt-4" href="tampilanproduk.php">[+] Tambah Produk</a></h4>
                
                <!-- Take away -->
                <div class="dropdown">
                    <button class="btn btn-info btn-block mt-2 mb-2 dropdown-toggle" style="height: 40px;" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Take Away
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Delivery by Grab</a>
                        <a class="dropdown-item" href="#">Delivery by Gojek</a>
                    </div>
                </div>

                <!-- Mang Jay -->
                <div class="judullist bg-info btn-block pt-3 pb-3 text-center text-dark fas fa-user-alt">
                    <strong class="text-light" style="font-family:sans-serif;">Mang Jay</strong>
                </div>

                <!-- Keranjang -->
                <div class="listkeranjang mt-3 mb-3" id="listkeranjang" style="padding: 5px; overflow-y: scroll; width: 350px; height: 300px;">
                    
                </div>

                <!-- Perhitungan harga -->
                <table width="100%">
                    <tbody>
                        <!-- <tr>
                            <td>Total Barang</td>
                            <td><span id="nama"></span></td>
                        </tr> -->
                        <tr>
                            <td>Discount (10%)</td>
                            <td>Rp. <span id="discount"></span></td>
                        </tr>
                        <tr>
                            <td>PPN (2%)</td>
                            <td>Rp. <span id="pajak"></span></td>
                        </tr>
                        <tr class="bg-info text-white">
                            <td>Total Bayar</td>
                            <td>Rp. <span id="totalbayar"></span></td>
                        </tr>
                    </tbody>
                </table>

                <!-- button transaksi -->
                <button type="button" class="btn btn-info mt-3 btn-block" onclick="tambahTransaksi()">
                    <i class="far fa-credit-card"></i>
                        Payment
                </button>
            </div>

            <!-- item list -->
            <div class="col-8">
                <div class="bg-light" style="height: 40px; font-size: 20px; margin-left: 70px; margin-top: 75px;">
                    <div class="item" style="margin-left: 10px;">Item List</div>
                    <!-- icon -->
                    <div class="icon">
                        <!-- search -->
                        <i class="fas fa-search" style="float: right; margin-top: -20px; margin-right: 60px;"></i>
                        <!-- arrow down up -->
                        <i class="fas fa-ellipsis-v" style="float: right; margin-top: -20px; margin-right: 40px;"></i>
                        <!-- three dots -->
                        <i class="fas fa-sort-alt" style="float: right; margin-top: -20px; margin-right: 10px;"></i>
                    </div>
                </div>

                <!-- list produk -->
                <div class="col-12 mt-2" id="listproduk" style="margin-left: 60px;">
                <?php
                    $sql = "SELECT * FROM produk";
                    $query = mysqli_query($connect,$sql);

                    while($produk = mysqli_fetch_array($query)){
                        echo '<div class="card float-left mr-4 mb-3 bg-light text-dark" style="width: 9em;">';
                        echo '<img src="'. $produk['gambar'] .'" class="card-img-top" alt="...">';
                        echo '<div class="card-body">';
                        echo '<h6 class="card-title text-center">' . $produk['nama_produk'] . '</h6>';
                        echo '<p class="card-text kartu harga">Rp. ' .number_format ($produk['harga']) . '</p>';
                        echo '<form action="#" method="POST">';
                        echo '<input class="form-control" type="hidden" id="produk_id" name="produk_id" value="' . $produk['id'] . '">';
                        echo '<input class="form-control" type="hidden" id="quantity" name="quantity" value="1">';
                        echo '<input class="form-control" type="hidden" id="harga" name="harga" value="' . $produk['harga'] . '">';
                        echo '<button type="submit" name="keranjang" class="btn btn-info btn-block kartu beli">Beli <svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' .
                        '<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>' .
                        '</svg></button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="mt-5 text-light bg-info" style="height: 75px;">
        <p class="text-center pt-4">&copy; Copyright Starbhakmart 2021 </p>
    </footer>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>