<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $jenis_permohonan = $_POST['jenis_permohonan'];
    $nama_permohonan = $_POST['nama_permohonan'];
    $alamat = $_POST['alamat'];
    $skala = $_POST['skala'];
    $nib = $_POST['nib'];
    $nama_perizinan = $_POST['nama_perizinan'];
    $jenis_perizinan = $_POST['jenis_perizinan'];
    $kategori = $_POST['kategori'];
    $sektor_perizinan = $_POST['sektor_perizinan'];
    $sektor_usaha = $_POST['sektor_usaha'];


    $insert1 = mysqli_query($db, "UPDATE tb_usaha SET tanggal='$tanggal', jenis_permohonan='$jenis_permohonan', nama_permohonan='$nama_permohonan', alamat='$alamat', skala='$skala', nib='$nib', nama_perizinan='$nama_perizinan', jenis_perizinan='$jenis_perizinan' , kategori='$kategori', sektor_perizinan='$sektor_perizinan' , sektor_usaha='$sektor_usaha' WHERE id='$id'");
    if ($insert1) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../daftar.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Disimpan';
        echo "<script>document.location.href='../daftar.php'</script>";
    }
} else {
    $_SESSION['info'] = 'Gagal Disimpan';
    echo "<script>document.location.href='../daftar.php'</script>";
}
