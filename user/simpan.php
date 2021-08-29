<?php
include '../koneksi.php';
if (!empty($_GET['keranjang'])) {
    $produk_id = $_POST['produk_id'];
    $quantity = $_POST['quantity'];
    $harga = $_POST['harga'];

    // if ($produk_id = $produk_id) {
    //     $quantity++;
    // }

    $jumlah_harga = $harga * $quantity;

    $sql = "INSERT INTO keranjang (produk_id, quantity, jumlah_harga)
        VALUES ('$produk_id', '$quantity', '$jumlah_harga')";

    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('Location: index.php');
    } else {
        header('Location: simpan.php?status=gagal');
    }
}
?>

<?php
if (!empty($_GET['transaksi'])) {
    $discount = $_POST['diskon'];
    $pajak = $_POST['ppn'];
    $totalbelanja = $_POST['total_bayar'];

    $sql = "INSERT INTO transaksi (diskon, ppn, total_bayar)
        VALUES ('$discount','$pajak', '$totalbelanja')";

    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('Location: index.php');
    } else {
        header('Location: simpan.php?status=gagal');
    }
}
?>