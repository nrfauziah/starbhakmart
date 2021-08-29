<?php

include '../koneksi.php';

if (isset($_POST['simpan'])) {
	// $id = $_POST['id_produk'];
	$nama_produk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$gambar = $_POST['gambar'];
	
$sql = "INSERT INTO produk (nama_produk, harga, gambar) VALUES ('$nama_produk','$harga', '$gambar')";
$query = mysqli_query($connect, $sql);
	if ($query) {
	header('Location: index.php');
	}else{
	header('Location: simpandata.php?status=gagal');
	}
}
?>