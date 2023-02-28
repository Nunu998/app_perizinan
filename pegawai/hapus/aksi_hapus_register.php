<?php
session_start();
include "../koneksi.php";

if ($_GET['username'] != "") {
    $username = $_GET['username'];
    $sql = mysqli_query($db, "DELETE FROM t_user WHERE username='$username'");
    if ($sql) {
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='../admin_status.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Dihapus';
        echo "<script>document.location.href='../admin_status.php'</script>";
    }
}
