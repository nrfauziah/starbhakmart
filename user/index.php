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
        <span><a href="../admin/index.php" style="text-decoration: none; color: white;">Admin</a></span>
    </nav>
    <!-- Tutup Navbar -->
    
    <div class="container">
        <!-- Bagian troli/list -->
        <div class="row">
            <div class="col-4">
                <!-- Take away -->
                <div class="dropdown">
                    <button class="btn btn-info btn-block mt-4 mb-2 dropdown-toggle" style="height: 40px;" type="button" id="dropdownMenuButton"
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
                    <?php
                    $sql = "SELECT keranjang.*, produk.* FROM keranjang LEFT JOIN produk ON produk.id=keranjang.produk_id";
                    $query = mysqli_query($connect, $sql);

                    while ($keranjang = mysqli_fetch_array($query)) {
                        echo '<div class="invoice bg-white border border-dark pl-1 pt-1 m-1">';
                        echo '<div class="row">';
                        echo '<div class="col-5">';
                        echo '<h6>' . $keranjang['nama_produk'] . '</h6>';
                        echo '<p>Price : <span class="font-fira">Rp.'  . number_format($keranjang['jumlah_harga']) .  '</span></p>';
                        echo '</div>';
                        echo '<div class="col-4">';
                        // echo '<h6 class="font-fira text-right"></h6>';
                        echo '<p class="text-right">Quantity : <span class="font-fira">' . number_format($keranjang['quantity'])  .  '</span></p>';
                        echo '</div>';
                        echo '<div class="col-3">';

                        echo '<a href="hapus.php?keranjang=hapus&id_keranjang=' . $keranjang['id_keranjang'] . '"><button class="btn btn-danger btn-sm">';
                        echo '<svg style="margin-top: 10px;" width="30px" height="30px" viewBox="0 0 16 16" class="bi bi-trash mt-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />';
                        echo '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />';
                        echo '</svg>';
                        echo '</button></a>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Perhitungan harga -->
                <?php
                $discount = 0;
                $pajak = 0;
                $hargatotal = 0;
                $totalbayar = 0;
                $totalbelanja = 0;

                $sql = "SELECT jumlah_harga FROM `keranjang`";
                $query = mysqli_query($connect, $sql);

                while ($keranjang = $query->fetch_assoc()) {
                    $perbarang = $keranjang['jumlah_harga'];
                    $hargatotal = $perbarang + $hargatotal;
                    // $totalbayar = $hargatotal;

                    if ($hargatotal >= 50000) {
                        $discount = $hargatotal * 0.10;
                    } else {
                        $discount = 0;
                    }

                    $totalbayar = $hargatotal - $discount;
                    $pajak = $totalbayar * 0.02;

                    $totalbelanja = $totalbayar + $pajak;
                }
                ?>
                
                <table width="100%">
                    <tbody>
                        <!-- <tr>
                            <td>Total Barang</td>
                            <td><span id="nama"></span></td>
                        </tr> -->
                        <tr>
                            <td>Discount (10%)</td>
                            <td>Rp. <span id="discount">    
                                <?php
                                echo number_format($discount);
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>PPN (2%)</td>
                            <td>Rp. <span id="pajak">
                                <?php
                                echo number_format($pajak);
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-info text-white">
                            <td>Total Bayar</td>
                            <td>Rp. <span id="totalbayar">
                                <?php
                                echo number_format($totalbelanja);
                                ?>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    
                <!-- button transaksi -->
                <form action="simpan.php?transaksi=simpan" method="POST">
                    <input type="hidden" name="diskon" value="<?php echo $discount ?>">
                    <input type="hidden" name="ppn" value="<?php echo $pajak ?>">
                    <input type="hidden" name="total_bayar" value="<?php echo $totalbelanja ?>">
                    <button type="submit" class="btn btn-block btn-info p-2 mt-2" name="transaksi">
                        <i class="far fa-credit-card"></i>
                            Payment
                    </button>
                </form>

                <div class="mt-4">
                    <table class="table text-center mt-1" style="margin-left: -100px; width: 530px;">
                        <thead>
                            <tr class="bg-info">
                                <th>Id</th>
                                <th>Discount</th>
                                <th>Pajak</th>
                                <th>Total Harga</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM transaksi";
                            $query = mysqli_query($connect, $sql);

                            while ($transaksi = mysqli_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td class='bg-white border border-dark pl-1 pt-1 m-1' style='color: black;'> " .$transaksi['id_transaksi'] . "</td>";
                                echo "<td class='bg-white border border-dark pl-1 pt-1 m-1' style='color: black;'> Rp. " . number_format($transaksi['diskon']) . "</td>";
                                echo "<td class='bg-white border border-dark pl-1 pt-1 m-1' style='color: black;'> Rp. " . number_format($transaksi['ppn']) . "</td>";
                                echo "<td class='bg-white border border-dark pl-1 pt-1 m-1' style='color: black;'> Rp. " . number_format($transaksi['total_bayar']) . "</td>";
                                // echo "<a class='btn btn-success' href='formedit.php?kode_produk=" . $produk['kode_produk'] . "'>edit</a> | ";
                                echo "<td class='bg-white border border-dark'>";
                                echo '<form action="hapus.php?transaksi=hapus&id_transaksi=' . $transaksi['id_transaksi'] . '" method="POST">';
                                echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- item list -->
            <div class="col-8">
                <div class="bg-light mt-4" style="height: 40px; font-size: 20px; margin-left: 70px;">
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
                        echo '<form action="simpan.php?keranjang=simpan" method="POST">';
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