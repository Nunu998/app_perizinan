<?php
session_start();
include '../../koneksi/koneksi.php';


if (isset($_POST['insert'])) {
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


    if ($tanggal != "" || $jenis_permohonan != "" || $nama_permohonan != "" || $alamat != "" || $skala != "" || $nib != "" || $nama_perizinan != "" || $jenis_perizinan != "" || $kategori != "" || $sektor_perizinan != ""|| $sektor_usaha != "") {


        $cek_user = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_usaha WHERE nama_permohonan='$_POST[nama_permohonan]'"));
        if ($cek_user) {
            $_SESSION['info'] = 'hp';
            echo "<script>document.location.href='../daftar.php'</script>";
        } else {
    
                //query tambah
                $insert =  mysqli_query($db, "INSERT INTO tb_usaha VALUES('', '$tanggal', '$jenis_permohonan', '$nama_permohonan','$alamat' , '$skala' , '$nib','$nama_perizinan','$jenis_perizinan','$kategori','$sektor_perizinan','$sektor_usaha')");

                if ($insert) {
                    $_SESSION['info'] = 'Disimpan';
                    echo "<script>document.location.href='../daftar.php'</script>";
                } else {
                    $_SESSION['info'] = 'Gagal Disimpan';
                    echo "<script>document.location.href='../daftar.php'</script>";
                }
            }
        }
    }

