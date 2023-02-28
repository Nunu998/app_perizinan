<?php
session_start();
include "../koneksi.php";

if ($_GET['id_surat'] != "") {
    $id = $_GET['id_surat'];
    $sql = mysqli_query($db, "DELETE FROM tb_suratkeluar WHERE id_surat='$id'");
    if ($sql) {
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='../suratkeluar.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Dihapus';
        echo "<script>document.location.href='../suratkeluar.php'</script>";
    }
}
