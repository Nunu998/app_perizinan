<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
   
   
    $insert1 = mysqli_query($db, "UPDATE tb_barang SET nama_barang='$nama_barang' WHERE id='$id'");
    if ($insert1) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../barang.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Disimpan';
        echo "<script>document.location.href='../barang.php'</script>";
    }
} else {
    $_SESSION['info'] = 'Gagal Disimpan';
    echo "<script>document.location.href='../barang.php'</script>";
}
