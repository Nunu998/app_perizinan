<?php
session_start();
include "../koneksi.php";

if ($_GET['id_user'] != "") {
    $id = $_GET['id_user'];
    $sql = mysqli_query($db, "DELETE FROM t_user WHERE id_user='$id'");
    if ($sql) {
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='../user.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Dihapus';
        echo "<script>document.location.href='../user.php'</script>";
    }
}
