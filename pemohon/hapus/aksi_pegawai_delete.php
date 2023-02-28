<?php
session_start();
include "../koneksi.php";

if ($_GET['no_urut'] != "") {
    $id = $_GET['no_urut'];
    $sql = mysqli_query($db, "DELETE FROM tb_pegawai WHERE no_urut='$id'");
    if ($sql) {
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='../datapegawai.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Dihapus';
        echo "<script>document.location.href='../datapegawai.php'</script>";
    }
}
