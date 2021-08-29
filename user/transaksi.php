<?php
include '../koneksi.php';
if (!empty($_GET['transaksi'])){
    $diskon = $_POST['diskon'];
    $ppn = $_POST['ppn'];
    $totalbayar = $_POST['totalbayar'];
    $my_arr = unserialize($_GET['transaksi']);

    // Insert data ke table Transaksi
    $insertTransaksi = "INSERT INTO transaksi (diskon, ppn, totalbayar, status_transaksi) VALUES ('$diskon', '$ppn', '$totalbayar', ".TRUE.")";
    $query = mysqli_query($connect, $insertTransaksi);
    // Mengambil ID dari table Transaksi
    $idTransaksi = mysqli_insert_id($connect); 

    foreach($my_arr as $value){
        // Me-looping data
        $id_produk = $value["id_produk"];
        $nama_produk = $value["nama_produk"];
        $harga_produk = $value["harga_produk"];
        $jumlah_harga = $value["jumlah_harga"];
        $quantity = $value["quantity"];
        
        // Insert data ke table transaksi_detail
        $insertTransaksiDetail = "INSERT INTO transaksi_detail (id_produk, id_transaksi, nama_produk, harga_produk, quantity, total_bayar) VALUES ('$id_produk', '$idTransaksi', '$nama_produk','$harga_produk', '$quantity', '$jumlah_harga')";
        $result = mysqli_query($connect, $insertTransaksiDetail);
    }
    if($query){
        header('Location: tampildata.php');
        $insertTransaksi = "TRUNCATE TABLE keranjang;";
        $query = mysqli_query($connect, $insertTransaksi);
    }else{
        header('Location: transaksi.php?status=gagal');
    }
}
?>