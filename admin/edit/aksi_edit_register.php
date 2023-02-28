<?php
session_start();
include "../koneksi.php";

if ($_GET['username'] != "") {
    $username = $_GET['username'];
    $sql = mysqli_query($db, "UPDATE t_user set status='yes' WHERE username = '$_SESSION[test_name]';");
    unset($_SESSION['test_name']);
    if ($sql) {
        $_SESSION['info'] = 'Dikonfirmasi';
        echo "<script>document.location.href='../admin_status.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Disimpan';
        echo "<script>document.location.href='../admin_status.php'</script>";
    }
}
