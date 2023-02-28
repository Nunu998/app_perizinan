<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $nama_kbli = $_POST['nama_kbli'];
    $kode_kbli = $_POST['kode_kbli'];
   
    $insert1 = mysqli_query($db, "UPDATE tb_kbli SET nama_kbli='$nama_kbli', kode_kbli='$kode_kbli' WHERE id='$id'");
    if ($insert1) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../kbli.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Disimpan';
        echo "<script>document.location.href='../kbli.php'</script>";
    }
} else {
    $_SESSION['info'] = 'Gagal Disimpan';
    echo "<script>document.location.href='../kbli.php'</script>";
}
