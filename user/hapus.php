<?php
include '../koneksi.php';
if (!empty($_GET['keranjang'])) {

    $id_keranjang = $_GET['id_keranjang'];

    $sql = "DELETE FROM keranjang WHERE id_keranjang = $id_keranjang";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('location: index.php');
    } else {
        header('location: hapus.php?status=gagal');
    }
}

if (!empty($_GET['transaksi'])) {

    $id_transaksi = $_GET['id_transaksi'];

    $sql = "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('location: index.php');
    } else {
        header('location: hapus.php?status=gagal');
    }
}

