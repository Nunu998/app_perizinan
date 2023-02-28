
<?php
session_start();
include '../koneksi.php';

if (isset($_POST['insert'])) {
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $insert1 = mysqli_query($db, "UPDATE tb_telahaan SET keterangan='$keterangan', status='yes' WHERE nama_lengkap = '$_SESSION[test_name]';");
    if ($insert1) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../telahaan.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Disimpan';
        echo "<script>document.location.href='../telahaan.php'</script>";
    }
} else {
    $_SESSION['info'] = 'Gagal Disimpan';
    echo "<script>document.location.href='../telahaan.php'</script>";
}
