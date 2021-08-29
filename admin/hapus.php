<?php
include '../koneksi.php';
$nama_produk = $_GET["nama_produk"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $sql = "DELETE FROM `produk` WHERE nama_produk='$nama_produk'";
    $query = mysqli_query($connect, $sql);

    //periksa query, apakah ada kesalahan
    if(!$query) {
        die ("Gagal menghapus data: ".mysqli_errno($connect).
        " - ".mysqli_error($connect));
    } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='tampilanproduk.php';</script>";
    }