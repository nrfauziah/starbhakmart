<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
        

    $sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', gambar='$gambar' WHERE nama_produk='$nama_produk'";
    $query =mysqli_query($connect,$sql);
    if ($query) {
        header('Location: tampilanproduk.php');
    }else{
        header('location: edit.php?status=gagal');
    }
}
?>